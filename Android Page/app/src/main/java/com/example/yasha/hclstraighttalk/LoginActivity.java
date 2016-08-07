package com.example.yasha.hclstraighttalk;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

/**
 * Created by Yasha on 06-08-2016.
 */
public class LoginActivity extends AppCompatActivity {

    EditText etEmail;
    EditText etPassword;
    Button btnLogin;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        etEmail = (EditText) findViewById(R.id.email);
        etPassword = (EditText) findViewById(R.id.password);

        btnLogin = (Button) findViewById(R.id.email_sign_in_button);

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if (!etEmail.getText().toString().equals("")) {
                    if (!etPassword.getText().toString().equals("")) {
                        startActivity(new Intent(LoginActivity.this, Dashboard.class));
                    } else {
                        Toast.makeText(LoginActivity.this, "no password", Toast.LENGTH_LONG).show();
                    }
                } else {
                    Toast.makeText(LoginActivity.this, "no email", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    public void openMenu(View view) {
        Intent intent = new Intent(this, Dashboard.class);
        startActivity(intent);
    }
}
