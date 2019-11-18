package amsi.dei.estg.ipleiria.surfectstore;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.res.ResourcesCompat;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Login extends AppCompatActivity {

    private EditText email, password;
    private Button login;
    private TextView contaNao;
    private static String URL_LOGIN = "http://10.80.10.110/android_register_login/login.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // Pôr logotipo como imagem na ActionBar
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        email = (EditText) findViewById(R.id.log_etEmail);
        password = (EditText) findViewById(R.id.log_etPassword);
        login = (Button) findViewById(R.id.log_btLogin);
        contaNao = (TextView) findViewById(R.id.log_tvContaNao);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String _email = email.getText().toString().trim();
                String _password = password.getText().toString().trim();

                if(!_email.isEmpty() || !_password.isEmpty()){
                    Login(_email, _password);
                } else {
                    email.setError("Por favor insira o email!");
                    password.setError("Por favor insira a password!");
                }
            }
        });

        contaNao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Login.this, Register.class);
                startActivity(intent);
            }
        });
    }


    private void Login(final String email, final String password) {

        StringRequest stringRequest =  new StringRequest(Request.Method.POST, URL_LOGIN,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String sucesso = jsonObject.getString("sucesso");
                            JSONArray jsonArray = jsonObject.getJSONArray("login");

                            if (sucesso.equals("1")) {

                                for(int i = 0; i < jsonArray.length(); i++) {

                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String name = object.getString("name").trim();

                                    Toast.makeText(Login.this,
                                            "Login efetuado com sucesso! \nBem vindo " + name + ".",
                                            Toast.LENGTH_SHORT).show();
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(Login.this, "Erro!" + e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Login.this, "Erro!" + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("email", email);
                params.put("password", password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
