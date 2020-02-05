package amsi.dei.estg.ipleiria.surfectstore.activities;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

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

public class Login extends AppCompatActivity {

    private EditText email, password;
    private Button login;
    private TextView contaNao;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private Boolean saveLogin;
    private CheckBox saveLoginCheckBox;
    //private static String URL_LOGIN = "http://10.12.51.60/api/web/user/login";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        inicializeComponents();

        // Pôr logotipo como imagem na ActionBar
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String _email = email.getText().toString().trim();
                String _password = password.getText().toString().trim();

                Intent intent = getIntent();
                String primeiroNome = intent.getStringExtra("primeiroNome");
                String ultimoNome = intent.getStringExtra("ultimoNome");
                String dataDeNascimento = intent.getStringExtra("dataDeNascimento");
                String numeroTelemovel = intent.getStringExtra("numeroTelemovel");

                Login(_email, _password, primeiroNome, ultimoNome, dataDeNascimento, numeroTelemovel);

            }
        });

        saveLogin = sharedPreferences.getBoolean("saveLogin", true);
        if(saveLogin){
            email.setText(sharedPreferences.getString("email", null));
            password.setText(sharedPreferences.getString("password", null));
        }

        contaNao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Login.this, Register.class);
                startActivity(intent);
            }
        });
    }


    private void Login(final String email, final String password, final String primeiroNome, final String ultimoNome, final String numeroTelemovel, final String dataDeNascimento) {

        inicializeComponents();

        if(email.equals("")){
            Toast.makeText(Login.this, "É obrigatório inserir o seu email!", Toast.LENGTH_SHORT).show();
        }
        else if (password.equals("")){
            Toast.makeText(Login.this, "É obrigatório inserir a sua password!", Toast.LENGTH_SHORT).show();
        }
        else {

            String epURL_LOGIN = Endpoints.URL_LOGIN;

            StringRequest stringRequest = new StringRequest(Request.Method.POST, epURL_LOGIN, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try{
                                if (response.equals("O email que inseriu não está registado no sistema!"/*"\""+ "Entrou com sucesso, bem-vindo!" +"\""*/)) {

                                    Toast.makeText(Login.this, response + "", Toast.LENGTH_SHORT).show();

                                } else if (response.equals("\""+ "A password não corresponde ao email!" +"\"")){

                                    Toast.makeText(Login.this, response + "", Toast.LENGTH_SHORT).show();

                                } else{

                                    Toast.makeText(Login.this, "Entrou com sucesso, bem-vindo!", Toast.LENGTH_SHORT).show();

                                    if(saveLoginCheckBox.isChecked()){
                                        editor.putBoolean("saveLogin", true);
                                        editor.putString("email", email);
                                        editor.putString("password", password);
                                        editor.commit();
                                    }
                                    else {
                                        editor.putBoolean("saveLogin", false);
                                    }

                                    Intent intent = new Intent(Login.this, Home.class);
                                    startActivity(intent);
                                    //editor.putString("email", email);
                                    //editor.putString("primeiroNome", primeiroNome);
                                    //editor.putString("ultimoNome", ultimoNome);
                                    //editor.putString("numeroTelemovel", numeroTelemovel);
                                    //editor.putString("dataDeNascimento", dataDeNascimento);
                                    //editor.apply();

                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                            }
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(Login.this, "Não registado! Tente outra vez! " + error.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("email", email);
                    params.put("password", password);
                    return params;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(Login.this);
            requestQueue.add(stringRequest);
        }

    }
    public void inicializeComponents(){
        // Achar os objetos no xml
        // EditText
        email = (EditText) findViewById(R.id.log_etEmail);
        password = (EditText) findViewById(R.id.log_etPassword);
        // Button
        login = (Button) findViewById(R.id.log_btLogin);
        // TextView
        contaNao = (TextView) findViewById(R.id.log_tvContaNao);
        // CheckBox
        saveLoginCheckBox = (CheckBox) findViewById(R.id.log_checkBoxLogin);
        // SharedPreferences
        sharedPreferences = getSharedPreferences("userInfo", MODE_PRIVATE);
        editor = sharedPreferences.edit();
    }

}
