package com.example.android.langfc;

/**
 * Created by todd_ on 2/13/2017.
 */

/**
 * Created by todd_ on 2/13/2017.
 */

public class word {

    private String mDefaultWord;
    private String mMiwokWord;
    private String mSpanishWord;
    private String mGermanWord;
    private String mJapaneseWord;
    private int mAudioID;
    private static final int IDV = -1;
    private int mImangeResouceID = IDV;

    public word(String DefaultWord, String MiwokWord, String SpanishWord, String GermanWord, int audio) {
        mDefaultWord = DefaultWord;
        mMiwokWord = MiwokWord;
        mSpanishWord = SpanishWord;
        mGermanWord = GermanWord;
        mAudioID = audio;
    }//word constructor

    public word(String DefaultWord, String MiwokWord, String SpanishWord, String GermanWord, int ID, int audio) {
        mDefaultWord = DefaultWord;
        mMiwokWord = MiwokWord;
        mSpanishWord = SpanishWord;
        mGermanWord = GermanWord;
        mImangeResouceID = ID;
        mAudioID = audio;
    }//word constructor2

    public String getDefault() {
        return mDefaultWord;
    }//getDefault

    public String getMiwok() {
        return mMiwokWord;
    }//getMiwok

    public String getSpanish() {
        return mSpanishWord;
    }//getSpanish

    public String getGerman() {
        return mGermanWord;
    }//getGerman

    //public String getJapanes() { return mJapaneseWord; }//getJapanese

    public int getImangeResouceID() { return mImangeResouceID; }//getImage

    public int getAudio() { return mAudioID; }//getAudio

    public boolean hasImage(){
        return mImangeResouceID != IDV;
    }//hasImage

}//word class
