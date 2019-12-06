package com.example.hotmetal;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;

public class PrincipalActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }
    public void goToInicioSesionActivity(View view){
        Intent i = new Intent(PrincipalActivity.this, InicioSesionActivity.class);
        startActivity(i);
    }
    public void goToRegistroActivity(View view){
        Intent i = new Intent(PrincipalActivity.this, RegistroActivity.class);
        startActivity(i);
    }
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId() == android.R.id.home){
            //Log.i("ActionBar", "Atrás!");
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder.setMessage(getString(R.string.pregunta));
            builder.setPositiveButton(getString(R.string.yes), new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    int p = android.os.Process.myPid();
                    android.os.Process.killProcess(p);
                }
            });
            builder.setNegativeButton(getString(R.string.no), new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    dialog.cancel();
                }
            });
            AlertDialog dialog = builder.create();
            dialog.show();
            //return true;
        }
        return super.onOptionsItemSelected(item);

    }
}
