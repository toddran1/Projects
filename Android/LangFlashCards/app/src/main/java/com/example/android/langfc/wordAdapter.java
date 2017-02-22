package com.example.android.langfc;

import android.app.Activity;
import android.support.annotation.NonNull;
import android.support.v4.content.ContextCompat;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by todd_ on 2/13/2017.
 */

public class wordAdapter extends ArrayAdapter<word>{

    private int mColorID;

    public wordAdapter(Activity context, ArrayList<word> words, int color) {
        // Here, we initialize the ArrayAdapter's internal storage for the context and the list.
        // the second argument is used when the ArrayAdapter is populating a single TextView.
        // Because this is a custom adapter for two TextViews and an ImageView, the adapter is not
        // going to use this second argument, so it can be any value. Here, we used 0.
        super(context, 0, words);
        mColorID = color;
    }//wordAdapter constructor

    @NonNull
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Check if the existing view is being reused, otherwise inflate the view
        View listItemView = convertView;
        if(listItemView == null) {
            listItemView = LayoutInflater.from(getContext()).inflate(
                    R.layout.list_item, parent, false);
        }

        // Get the {@link AndroidFlavor} object located at this position in the list
        word currentword = getItem(position);

        // Find the TextView in the list_item.xml layout with the ID version_name
        TextView defaultTextView = (TextView) listItemView.findViewById(R.id.default_textview);
        // Get the version name from the current "word" object and
        // set this text on the name TextView
        defaultTextView.setText(currentword.getDefault());

        TextView miwokTextView = (TextView) listItemView.findViewById(R.id.miwok_textview);
        miwokTextView.setText(currentword.getMiwok());

        TextView spanishTextView = (TextView) listItemView.findViewById(R.id.spanish_textview);
        spanishTextView.setText(currentword.getSpanish());

        TextView germanTextView = (TextView) listItemView.findViewById(R.id.german_textview);
        germanTextView.setText(currentword.getGerman());

        // Find the ImageView in the list_item.xml layout with the ID list_item_icon
        ImageView iconView = (ImageView) listItemView.findViewById(R.id.image_id);

        if(currentword.hasImage()) {
            iconView.setImageResource(currentword.getImangeResouceID());
            iconView.setVisibility(View.VISIBLE);
        } else {
            iconView.setVisibility(View.GONE);
        }

        View container = listItemView.findViewById(R.id.text_container);
        int Color = ContextCompat.getColor(getContext(),mColorID);
        container.setBackgroundColor(Color);

        // Return the whole list item layout (containing 2 TextViews and an ImageView)
        // so that it can be shown in the ListView
        return listItemView;
    }//getView
}//wordAdapter
