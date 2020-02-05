package amsi.dei.estg.ipleiria.surfectstore.ui.address;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

import amsi.dei.estg.ipleiria.surfectstore.Endpoints;
import amsi.dei.estg.ipleiria.surfectstore.R;

import static android.content.Context.MODE_PRIVATE;

public class AddressFragment extends Fragment {

    // Enunciar os objetos
    private TextView email;
    private EditText morada, codigoPostal, pais;
    private Button atualizarMorada;
    private Spinner distrito;
    // private static String URL_CREATE = "http://192.168.1.40/api/web/addresses/address";

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {

        View v = inflater.inflate(R.layout.fragment_address, container, false);

        inicializeComponents(v);

        // Obter string da atividade anterior
        SharedPreferences prefs = getActivity().getSharedPreferences("userInfo", MODE_PRIVATE);
        String extraEmail = prefs.getString("email", "Nenhum email definido.");

        // Atribuir os valores das strings às EditText
        pais.setText(R.string.nomePaís);
        email.setText(extraEmail);

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(getActivity(), R.array.distritos, R.layout.district_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        distrito.setAdapter(adapter);
        distrito.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        // Clicar no botão atualizar
        atualizarMorada.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AtualizarMorada();
            }
        });

        return v;
    }

    public void inicializeComponents(View v) {
        // Achar os objetos no xml
        // TextView
        email = (TextView)v.findViewById(R.id.mor_etEmail);
        // EditText
        morada = (EditText) v.findViewById(R.id.mor_etMorada);
        codigoPostal = (EditText) v.findViewById(R.id.mor_etCodigoPostal);
        pais = (EditText) v.findViewById(R.id.mor_etPais);
        // Button
        atualizarMorada = (Button) v.findViewById(R.id.mor_btAtualizar);
        // Spinner
        distrito = (Spinner) v.findViewById(R.id.mor_spinnerDistrito);
    }

    private void AtualizarMorada() {

        String epURL_ADDRESS = Endpoints.URL_ADDRESS;

        final String _morada = this.morada.getText().toString().trim();
        final String _codigoPostal = this.codigoPostal.getText().toString().trim();
        final String _pais = this.pais.getText().toString().trim();
        final String _distrito = this.distrito.getSelectedItem().toString();
        final String _email = this.email.getText().toString().trim();

        if (_morada.equals("")){
            Toast.makeText(getActivity(), "É obrigatório inserir a sua morada!", Toast.LENGTH_SHORT).show();
        }
        else if (_codigoPostal.equals("")){
            Toast.makeText(getActivity(), "É obrigatório inserir o seu código postal!", Toast.LENGTH_SHORT).show();
        }
        else if (_codigoPostal.length() < 8){
            Toast.makeText(getActivity(), "O código postal tem de ter os caractéres obrigatórios!", Toast.LENGTH_SHORT).show();
        }
        else {
            StringRequest stringRequest = new StringRequest(Request.Method.POST, epURL_ADDRESS,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            if(response.equals("Informações de envio atualizadas com sucesso!")){
                                Toast.makeText(getActivity(), response, Toast.LENGTH_SHORT).show();
                            } else {
                                Toast.makeText(getActivity(), response, Toast.LENGTH_SHORT).show();
                            }
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(getActivity(), "Não atualizado! Tente outra vez! " + error.toString(), Toast.LENGTH_SHORT).show();
                        }
                    })
            {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("morada", _morada);
                    params.put("codigoPostal", _codigoPostal);
                    params.put("pais", _pais);
                    params.put("distrito", _distrito);
                    params.put("email", _email);
                    return params;
                }
            };

            RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
            requestQueue.add(stringRequest);
        }

    }
}