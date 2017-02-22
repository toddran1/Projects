package com.example.todd_.muscplayertestapp;

import android.media.MediaPlayer;
import android.support.v4.widget.TextViewCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.MediaController;
import android.widget.TextView;
import android.widget.Toast;

import static android.icu.lang.UCharacter.GraphemeClusterBreak.V;

public class MainActivity extends AppCompatActivity {

    private MediaPlayer testplayer;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        testplayer = MediaPlayer.create(this, R.raw.sample);

        Button playbutton = (Button)findViewById(R.id.play_button);
        Button pausebutton = (Button)findViewById(R.id.pause_button);

        playbutton.setOnClickListener(new View.OnClickListener(){
            public void onClick(View V){
                testplayer.start();
            }//onClickplay

        });

        pausebutton.setOnClickListener(new View.OnClickListener(){
            public void onClick(View V){
                testplayer.pause();
            }//onClickpause

        });

    }//onCreate
}//Main
