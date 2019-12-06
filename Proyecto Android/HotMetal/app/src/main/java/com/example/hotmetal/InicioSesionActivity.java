package com.example.hotmetal;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;

public class InicioSesionActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_inicio_sesion);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }
    public void goToDashboardActivity(View view){
        Intent i = new Intent(InicioSesionActivity.this, DashboardActivity.class);
        startActivity(i);
    }
    public void goToRecuperarActivity(View view){
        Intent i = new Intent(InicioSesionActivity.this, RecuperarContrasenaActivity.class);
        startActivity(i);
    }
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home: //hago un case por si en un futuro agrego mas opciones
                Log.i("ActionBar", "Atrás!");
                finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }
}
