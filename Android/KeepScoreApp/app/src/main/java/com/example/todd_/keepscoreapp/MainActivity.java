package com.example.todd_.keepscoreapp;

import android.content.pm.ActivityInfo;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    //Varibles for Team A and B score
    int TeamAScore = 0;
    int TeamBScore = 0;

    //Opens main activity
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setRequestedOrientation (ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        setContentView(R.layout.activity_main);
    }//onCreate


    /**
     * 2 functions that increase the score for Team A and B by 1 point.
     */
    public void addOneForTeamA(View v) {
        TeamAScore = TeamAScore+1;
        displayForTeamA(TeamAScore);
    }//add1A

    public void addOneForTeamB(View v) {
        TeamBScore = TeamBScore+1;
        displayForTeamB(TeamBScore);
    }//add1B

    /**
     * 2 functions that increase the score for Team A and B by 2 points.
     */
    public void addTwoForTeamA(View v) {
        TeamAScore = TeamAScore+2;
        displayForTeamA(TeamAScore);
    }//add2A

    public void addTwoForTeamB(View v) {
        TeamBScore = TeamBScore+2;
        displayForTeamB(TeamBScore);
    }//add2B

    /** 2 differnt functions that increase the score
     * for Team A and B by 3 points.
     */
    public void addThreeForTeamA(View v) {
        TeamAScore = TeamAScore+3;
        displayForTeamA(TeamAScore);
    }//add3A

    public void addThreeForTeamB(View v) {
        TeamBScore = TeamBScore+3;
        displayForTeamB(TeamBScore);
    }//add3B


    /**
     * 2 Subtact functions
     */
    public void subtract_scoreA(View v) {
        if (TeamAScore > 0) {
            TeamAScore = TeamAScore - 1;
            displayForTeamA(TeamAScore);
        }//if
    }//subtractA

    public void subtract_scoreB(View v) {
        if (TeamBScore > 0) {
            TeamBScore = TeamBScore - 1;
            displayForTeamB(TeamBScore);
        }//if
    }//subtractB


    // Displays the given score for Team A.
    public void displayForTeamA(int score) {
        TextView scoreView = (TextView) findViewById(R.id.team_a_score);
        scoreView.setText(String.valueOf(score));
    }

    // Displays the given score for team B
    public void displayForTeamB(int score) {
        TextView scoreView = (TextView) findViewById(R.id.team_b_score);
        scoreView.setText(String.valueOf(score));
    }

    // Resets the scores of both team A and B to zero
    public void reset_score(View v) {
        TeamAScore = 0;
        TeamBScore = 0;
        displayForTeamA(TeamAScore);
        displayForTeamB(TeamBScore);
    }//reset

}//main