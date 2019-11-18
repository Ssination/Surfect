package amsi.dei.estg.ipleiria.surfectstore;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.app.DownloadManager;
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

    private EditText primeiroNome, ultimoNome, email, password, numeroTelemovel, dataDeNascimento;
    private Button registar;
    private TextView minusculas, maiusculas, numeros, caracteres;
    private RadioButton generoMasculino;
    private static String URL_REGIST = "http://10.80.10.110/android_register_login/register.php";

    private DatePickerDialog.OnDateSetListener setListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        // Achar os objetos no xml
        primeiroNome = findViewById(R.id.reg_etPrimeiroNome);
        ultimoNome = findViewById(R.id.reg_etUltimoNome);
        email = findViewById(R.id.reg_etEmail);
        numeroTelemovel = findViewById(R.id.reg_etTelemovel);
        dataDeNascimento = findViewById(R.id.reg_etDataDeNascimento);
        password = findViewById(R.id.reg_etPassword);

        generoMasculino = findViewById(R.id.reg_rbMasculino);

        registar = findViewById(R.id.reg_btRegistar);

        minusculas = findViewById(R.id.reg_tvMinusculas);
        maiusculas = findViewById(R.id.reg_tvMaiusculas);
        numeros = findViewById(R.id.reg_tvNumeros);
        caracteres = findViewById(R.id.reg_tvCaracteres);

        // Clicar no botão registar
        registar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Registar();
            }
        });

        // Colocar o logotipo na action bar
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        // Ao clicar na data de nascimento, aparece um datepicker dialog para escolher a data
        Calendar calendario = Calendar.getInstance();
        final int ano = calendario.get(Calendar.YEAR);
        final int mes = calendario.get(Calendar.MONTH);
        final int dia = calendario.get(Calendar.DAY_OF_MONTH);

        dataDeNascimento.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog datePickerDialog = new DatePickerDialog(
                        Register.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int ano, int mes, int dia) {
                        mes = mes + 1;
                        String data = ano + "/" + mes + "/" + dia;
                        dataDeNascimento.setText(data);
                    }
                }, ano, mes, dia);
                datePickerDialog.show();
            }
        });

        // Obter todos os caracteres da password
        password.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                String Password = password.getText().toString();
                ValidarPassword(Password);
            }

            @Override
            public void afterTextChanged(Editable s) {

            }
        });
    }

    // Procedimento Registar
    private void Registar(){
        final String _primeiroNome = this.primeiroNome.getText().toString().trim();
        final String _ultimoNome = this.ultimoNome.getText().toString().trim();
        final String _email = this.email.getText().toString().trim();
        final String _password = this.password.getText().toString().trim();
        final String _dataDeNascimento = this.dataDeNascimento.getText().toString().trim();
        final String _numeroTelemovel = this.numeroTelemovel.getText().toString().trim();
        final String _generoMasculino = this.generoMasculino.isChecked()? "M":"F";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGIST,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String sucesso = jsonObject.getString("sucesso");

                            if (sucesso.equals("1")) {
                                Toast.makeText(Register.this, "Registado com sucesso!", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(Register.this, "Não registado! Tente outra vez! " + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Register.this, "Não registado! Tente outra vez! " + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("primeiroNome", _primeiroNome);
                params.put("ultimoNome", _ultimoNome);
                params.put("email", _email);
                params.put("password", _password);
                params.put("dataDeNascimento", _dataDeNascimento);
                params.put("numeroTelemovel", _numeroTelemovel);
                params.put("generoMasculino", _generoMasculino);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    // Procedimento para validar se a password contém os requisitos necessários
    public void ValidarPassword(String password) {
        Pattern upperCase = Pattern.compile("[A-Z]");
        Pattern lowerCase = Pattern.compile("[a-z]");
        Pattern digitCase = Pattern.compile("[0-9]");

        if (!lowerCase.matcher(password).find()) {
            minusculas.setTextColor(Color.RED);
        } else {
            minusculas.setTextColor(Color.GREEN);
        }

        if (!upperCase.matcher(password).find()) {
            maiusculas.setTextColor(Color.RED);
        } else {
            maiusculas.setTextColor(Color.GREEN);
        }

        if (!digitCase.matcher(password).find()) {
            numeros.setTextColor(Color.RED);
        } else {
            numeros.setTextColor(Color.GREEN);
        }

        if (password.length() < 8) {
            caracteres.setTextColor(Color.RED);
        } else {
            caracteres.setTextColor(Color.GREEN);
        }
    }
}
