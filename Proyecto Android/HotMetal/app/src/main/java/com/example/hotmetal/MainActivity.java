package com.example.hotmetal;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }
    public void goToPrincipalActivity(View view){
        Intent i = new Intent(MainActivity.this, PrincipalActivity.class);
        startActivity(i);
    }

}
