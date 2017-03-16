package com.example.android.quakereport;

import static com.example.android.quakereport.R.id.date;
import static com.example.android.quakereport.R.id.magnitude;

/**
 * Created by todd_ on 2/22/2017.
 */

public class Earthquake {

    private Double mMagnitude;
    private String mLocation;
    private long mTimeInMilliSeconds;
    private String mUrl;

    public Earthquake(Double magnitude, String location, long time, String url) {
        mMagnitude = magnitude;
        mLocation = location;
        mTimeInMilliSeconds = time;
        mUrl = url;
    }//constructor

    public Double getMagnitude(){
        return mMagnitude;
    }//mag

    public String getLocation(){
        return mLocation;
    }//location

    public long getTimeInMilliseconds() {return mTimeInMilliSeconds; }//date

    public String getUrl() { return mUrl; }//geturl

}//Earthquake
