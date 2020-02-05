package amsi.dei.estg.ipleiria.surfectstore.ui.support;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;

import org.w3c.dom.Text;

import amsi.dei.estg.ipleiria.surfectstore.R;

import static android.content.Context.MODE_PRIVATE;

public class SupportFragment extends Fragment {

    private EditText para, de, assunto, mensagem;
    private Button btEnviar;
    private static final String mail = "surfect2020@gmail.com";

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_support, container, false);

        inicializeComponents(v);

        SharedPreferences prefs = getActivity().getSharedPreferences("userInfo", MODE_PRIVATE);
        String extraEmail = prefs.getString("email", "Nenhum email definido.");
        de.setText(extraEmail);

        btEnviar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String _para = para.getText().toString().trim();
                String[] emissores = _para.split(",");
                String _assunto = assunto.getText().toString().trim();
                String _mensagem = mensagem.getText().toString().trim();

                Intent intent = new Intent(Intent.ACTION_SEND);
                intent.putExtra(Intent.EXTRA_EMAIL, emissores);
                intent.putExtra(Intent.EXTRA_SUBJECT, _assunto);
                intent.putExtra(Intent.EXTRA_TEXT, _mensagem);
                intent.setType("message/rfc822");
                startActivity(Intent.createChooser(intent, "Escolha a plataforma"));
            }
        });

        return v;
    }

    public void inicializeComponents(View v){

        para = (EditText) v.findViewById(R.id.sup_etPara);
        de = (EditText)v.findViewById(R.id.sup_etDe);
        assunto = (EditText)v.findViewById(R.id.sup_etAssunto);
        mensagem = (EditText)v.findViewById(R.id.sup_etMensagem);
        btEnviar = (Button)v.findViewById(R.id.sup_btEnviar);

    }
}