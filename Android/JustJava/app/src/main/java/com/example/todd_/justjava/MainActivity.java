/**
 * Add your package below. Package name can be found in the project's AndroidManifest.xml file.
 * This is the package name our example uses:
 *
 * package com.example.android.justjava;
 */
package com.example.todd_.justjava;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.text.NumberFormat;

/**
 * This app displays an order form to order coffee.
 */
public class MainActivity extends AppCompatActivity {

    int quantity = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    /**
     * This method is called when the order button is clicked.
     */
    public void submitOrder(View view) {
        //name variable code
        EditText nameField = (EditText) findViewById(R.id.name_field);
        String name = nameField.getText().toString();
        //checkbox variable code
        CheckBox whippedCreamCheckbox = (CheckBox) findViewById(R.id.whipped_cream_checkBox);
        CheckBox chocolateCheckbox = (CheckBox) findViewById(R.id.chocolate_checkBox);
        boolean hasWhippedCream = whippedCreamCheckbox.isChecked();
        boolean hasChocolate = chocolateCheckbox.isChecked();

        if (quantity == 0) {
            Toast.makeText(this, "Please order at least 1 cup of coffee.", Toast.LENGTH_SHORT).show();
            return;
        }

        //order summary string
        String orderTotal = orderSummary(calcPrice(hasWhippedCream, hasChocolate),hasWhippedCream,hasChocolate,name);

        display(quantity);
        displayMessage(orderTotal);

        //to submit order as email (optional)
        //Intent intent = new Intent(Intent.ACTION_SENDTO);
        //intent.setData(Uri.parse("mailto:")); // only email apps should handle this
        //intent.putExtra(Intent.EXTRA_SUBJECT, "Order for: " + name);
        //intent.putExtra(Intent.EXTRA_TEXT, orderTotal);
       // if (intent.resolveActivity(getPackageManager()) != null) {
       //     startActivity(intent);
       // }//ifemail

    }//submitorder

    // puts the summary of an order into 1 single string
    public String orderSummary(int num, boolean whippedCream, boolean chocolate, String name) {
        return "Name: " + name + "\nAdd Whipped cream: " + whippedCream +
                "\nAdd Chocolate: " + chocolate + "\nQuantiy: " + quantity + "\nTotal: $" + num + "\nThank You!";

    }//orderSummary


    public int calcPrice(boolean whipCream, boolean chocolate) {
        int basePrice = 4;

        if (whipCream)
            basePrice = basePrice + 1;

        if (chocolate)
            basePrice = basePrice + 2;

        return quantity*basePrice;

    }//calcPrice


    public void increment(View view) {
        if(quantity < 99) {
            quantity = quantity + 1;
            display(quantity);
        } else Toast.makeText(this, "Order can't exceed 99 cups of coffee.", Toast.LENGTH_SHORT).show();
    }//increment

    public void decrement(View view) {
        if(quantity > 0) {
            quantity = quantity - 1;
            display(quantity);
        } else Toast.makeText(this, "The minimum for an order is 1 cup of coffee.", Toast.LENGTH_SHORT).show();
    }//decrement

    /**
     * This method displays the given quantity value on the screen.
     */
    private void display(int number) {
        TextView quantityTextView = (TextView) findViewById(R.id.quantity_text_view);
        quantityTextView.setText("" + number);
    }//display

    /**
     * This method displays the given text on the screen.
     */
    private void displayMessage(String message) {
        TextView orderTextView = (TextView) findViewById(R.id.order_summary_text_view);
        orderTextView.setText(message);
    }//displaymessage

}//main
