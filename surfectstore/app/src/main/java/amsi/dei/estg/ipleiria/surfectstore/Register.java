package amsi.dei.estg.ipleiria.surfectstore;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.graphics.Color;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;
import java.util.regex.Pattern;

public class Register extends AppCompatActivity {

    private EditText etPrimeiroNome, etUltimoNome, etEmail, etPassword, etTelemovel, etDataDeNascimento;
    private Button btRegistar;
    private TextView tvMinusculas, tvMaiusculas, tvNumeros, tvCaracteres;
    private RadioButton radioButton;
    private RadioGroup radioGroup;
    private DatePickerDialog.OnDateSetListener setListener;
    private static String URL_REGIST = "http://192.168.1.1/android_register_login/register.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        etPrimeiroNome = findViewById(R.id.etPrimeiroNome);
        etUltimoNome = findViewById(R.id.etUltimoNome);
        etEmail = findViewById(R.id.etEmail);
        etTelemovel = findViewById(R.id.etTelemovel);
        etDataDeNascimento = findViewById(R.id.etDataDeNascimento);
        etPassword = findViewById(R.id.etPassword);
        btRegistar = findViewById(R.id.btRegistar);
        tvMinusculas = findViewById(R.id.tvMinusculas);
        tvMaiusculas = findViewById(R.id.tvMaiusculas);
        tvNumeros = findViewById(R.id.tvNumeros);
        tvCaracteres = findViewById(R.id.tvCaracteres);
        radioGroup = (RadioGroup) findViewById(R.id.rgBotoes);

        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        btRegistar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Registar();
            }
        });

        Calendar calendario = Calendar.getInstance();
        final int ano = calendario.get(Calendar.YEAR);
        final int mes = calendario.get(Calendar.MONTH);
        final int dia = calendario.get(Calendar.DAY_OF_MONTH);

        etDataDeNascimento.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog datePickerDialog = new DatePickerDialog(
                        Register.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int ano, int mes, int dia) {
                        mes = mes + 1;
                        String data = ano + "/" + mes + "/" + dia;
                        etDataDeNascimento.setText(data);
                    }
                }, ano, mes, dia);
                datePickerDialog.show();
            }
        });

        etPassword.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                String password = etPassword.getText().toString();
                validarPassword(password);
            }

            @Override
            public void afterTextChanged(Editable s) {

            }
        });
    }
    private void Registar(){

        btRegistar.setVisibility(View.GONE);

        final String primeiroNome = this.etPrimeiroNome.getText().toString().trim();
        final String ultimoNome = this.etUltimoNome.getText().toString().trim();
        final String email = this.etEmail.getText().toString().trim();
        final String password = this.etPassword.getText().toString().trim();
        final String numeroTelemovel = this.etTelemovel.getText().toString().trim();
        final String dataNascimento = this.etDataDeNascimento.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGIST,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String sucesso = jsonObject.getString("sucesso");

                            if(sucesso.equals("1")){
                                Toast.makeText(Register.this, "Registado com sucesso!", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(Register.this, "Não foi efetuado o registo! Tente outra vez!" + e.toString(), Toast.LENGTH_SHORT).show();
                            btRegistar.setVisibility(View.VISIBLE);
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Register.this, "Não foi efetuado o registo! Tente outra vez!" + error.toString(), Toast.LENGTH_SHORT).show();
                        btRegistar.setVisibility(View.VISIBLE);
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("primeiro nome", primeiroNome);
                params.put("ultimo nome", ultimoNome);
                params.put("email", email);
                params.put("password", password);
                params.put("data de nascimento", dataNascimento);
                params.put("numero de telemovel", numeroTelemovel);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    public void validarPassword(String etPassword) {
        Pattern upperCase = Pattern.compile("[A-Z]");
        Pattern lowerCase = Pattern.compile("[a-z]");
        Pattern digitCase = Pattern.compile("[0-9]");

        if (!lowerCase.matcher(etPassword).find()) {
            tvMinusculas.setTextColor(Color.RED);
        } else {
            tvMinusculas.setTextColor(Color.GREEN);
        }

        if (!upperCase.matcher(etPassword).find()) {
            tvMaiusculas.setTextColor(Color.RED);
        } else {
            tvMaiusculas.setTextColor(Color.GREEN);
        }

        if (!digitCase.matcher(etPassword).find()) {
            tvNumeros.setTextColor(Color.RED);
        } else {
            tvNumeros.setTextColor(Color.GREEN);
        }

        if (etPassword.length() < 8) {
            tvCaracteres.setTextColor(Color.RED);
        } else {
            tvCaracteres.setTextColor(Color.GREEN);
        }
    }

    public void rbClick (View v) {

        int radioButtonId = radioGroup.getCheckedRadioButtonId();
        radioButton = (RadioButton) findViewById(radioButtonId);
    }
}
