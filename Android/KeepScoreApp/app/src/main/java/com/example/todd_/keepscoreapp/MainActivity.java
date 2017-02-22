package com.example.todd_.keepscoreapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    int TeamAScore = 0;
    int TeamBScore = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }


    /**
     * Increase the score for Team A by 1 point.
     */
    public void addOneForTeamA(View v) {
        TeamAScore = TeamAScore+1;
        displayForTeamA(TeamAScore);
    }

    public void addOneForTeamB(View v) {
        TeamBScore = TeamBScore+1;
        displayForTeamB(TeamBScore);
    }

    /**
     * Increase the score for Team A by 2 points.
     */
    public void addTwoForTeamA(View v) {
        TeamAScore = TeamAScore+2;
        displayForTeamA(TeamAScore);
    }

    public void addTwoForTeamB(View v) {
        TeamBScore = TeamBScore+2;
        displayForTeamB(TeamBScore);
    }

    /**
     * Increase the score for Team A by 3 points.
     */
    public void addThreeForTeamA(View v) {
        TeamAScore = TeamAScore+3;
        displayForTeamA(TeamAScore);
    }

    public void addThreeForTeamB(View v) {
        TeamBScore = TeamBScore+3;
        displayForTeamB(TeamBScore);
    }

    /**
     * Displays the given score for Team A.
     */
    public void displayForTeamA(int score) {
        TextView scoreView = (TextView) findViewById(R.id.team_a_score);
        scoreView.setText(String.valueOf(score));
    }

    public void displayForTeamB(int score) {
        TextView scoreView = (TextView) findViewById(R.id.team_b_score);
        scoreView.setText(String.valueOf(score));
    }

    public void reset_score(View v) {
        TeamAScore = 0;
        TeamBScore = 0;
        displayForTeamA(TeamAScore);
        displayForTeamB(TeamBScore);
    }

}//main