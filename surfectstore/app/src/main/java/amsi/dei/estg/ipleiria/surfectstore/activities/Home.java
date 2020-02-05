package amsi.dei.estg.ipleiria.surfectstore.activities;

import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import android.os.Handler;
import android.text.SpannableString;
import android.text.style.TextAppearanceSpan;
import android.view.MenuItem;

import androidx.appcompat.app.AlertDialog;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

import com.google.android.material.navigation.NavigationView;

import androidx.drawerlayout.widget.DrawerLayout;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.Menu;
import android.widget.TextView;
import android.widget.Toast;

import amsi.dei.estg.ipleiria.surfectstore.R;

public class Home extends AppCompatActivity {

    private AppBarConfiguration appBarConfiguration;
    private TextView name, surname, email;
    private boolean backPressedTwoTimes = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // Achar os elementos no layout através do id
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        Menu menu = navigationView.getMenu();
        TextView name = (TextView) navigationView.getHeaderView(0).findViewById(R.id.home_tvName);
        TextView email = (TextView) navigationView.getHeaderView(0).findViewById(R.id.home_tvEmail);
        Toolbar toolbar = findViewById(R.id.toolbar);

        SharedPreferences prefs = getSharedPreferences("userInfo", MODE_PRIVATE);
        String extraEmail = prefs.getString("email", "Nenhum email definido.");
        String extraPrimeiroNome = prefs.getString("primeiroNome", "Bem-vindo ");
        String extraUltimoNome = prefs.getString("ultimoNome", "utilzador!");

        // Dar o valor das strings da atividade anterior a duas TextView desta atividade
        name.setText(extraPrimeiroNome + " " + extraUltimoNome);
        email.setText(extraEmail);

        setSupportActionBar(toolbar);

        // Colocar o logotipo na action bar
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setLogo(R.drawable.logo2);
        getSupportActionBar().setDisplayUseLogoEnabled(true);

        // Colocar a cor branca num titulo de um grupo
        MenuItem groupOutros = menu.findItem(R.id.groupOutros);
        SpannableString spannableString = new SpannableString(groupOutros.getTitle());
        spannableString.setSpan(new TextAppearanceSpan(this, R.style.groupNavView), 0, spannableString.length(), 0);
        groupOutros.setTitle(spannableString);

        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations.
        appBarConfiguration = new AppBarConfiguration.Builder(
                R.id.nav_inicio, R.id.nav_perfil, R.id.nav_loja,
                R.id.nav_morada, R.id.nav_suporte, R.id.nav_sessao)
                .setDrawerLayout(drawer)
                .build();
        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        NavigationUI.setupWithNavController(navigationView, navController);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.home, menu);
        return true;
    }

    @Override
    public boolean onSupportNavigateUp() {
        NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
        return NavigationUI.navigateUp(navController, appBarConfiguration)
                || super.onSupportNavigateUp();
    }

    @Override
    public void onBackPressed() {
        final AlertDialog.Builder builder = new AlertDialog.Builder(Home.this);
        builder.setTitle("Sair da aplicação")
                .setMessage("Tem a certeza que pretende sair da aplicação?")
                .setCancelable(true)
                .setPositiveButton("Sim", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        finish();
                    }
                });
        builder.setNegativeButton("Não", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.cancel();
            }
        });
        AlertDialog alertDialog = builder.create();
        alertDialog.show();
    }
}
