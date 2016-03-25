package dotmons.arduino.com;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import dotmons.arduino.com.arduino.R;

public class StartCoffee extends AppCompatActivity {

    Button btnCoff, btnReset;

    String generalstate="";

    TextView display;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start_coffee);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        statusCoffee();

        btnCoff = (Button) findViewById(R.id.btnCoffee);
        btnReset = (Button) findViewById(R.id.btnResetCoffee);

        display = (TextView) findViewById(R.id.txtstart);



        btnCoff.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                statusCoffee();
                Log.d("finalStatus:", generalstate);

                if (generalstate.equals("71"))
                {
                    try {
                        makeCoffee();
                        Thread.sleep(10000);
                        pauseCoffee();
                    }
                    catch (Exception e)
                    {
                        Log.d("Thread Exception", e.toString());
                    }

                }
                else if (generalstate.equals("61"))
                {
                    display.setText("");
                    Toast.makeText(getApplicationContext(), "Please, refill the coffee maker and click reset button", Toast.LENGTH_LONG).show();
                }
                else if (generalstate.equals("81"))
                {
                    display.setText("");
                    Toast.makeText(getApplicationContext(), "Coffee initialization started", Toast.LENGTH_LONG).show();
                }

            }
        });

        btnReset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                readyCoffee();
                display.setText("");
                Toast.makeText(getApplicationContext(), "Reset button initiated. You can make coffee now!!!", Toast.LENGTH_LONG).show();
            }
        });


        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_start_coffee, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    public void makeCoffee() {
        new CoffeeInitialization("81").execute();
    }

    public void readyCoffee() {
        new CoffeeInitialization("71").execute();
    }

    public void pauseCoffee() {
        new CoffeeInitialization("61").execute();
    }

    public void statusCoffee() {
        new CoffeeInitialization("51").execute();
    }










    /**
     * Created by Dotmons on 2016-03-19.
     */
    public class CoffeeInitialization extends AsyncTask<String, Void, String> {

        String msg = "";

        public CoffeeInitialization(String msg) {
            this.msg = msg;

        }

        public String CoffeeOption(String msg) {
            String webContent = "";
            if (msg=="51")
            {
                webContent = "http://www.dotmons.com/coffeemaker/coffeemaker.php";
            }
            else if (msg=="61")
            {
                webContent = "http://www.dotmons.com/coffeemaker/pausecoffee.php";
            }

            if (msg=="71")
            {
                webContent = "http://www.dotmons.com/coffeemaker/readycoffee.php";
            }
            else if (msg=="81")
            {
                webContent = "http://www.dotmons.com/coffeemaker/makecoffee.php";
            }

            try {
                Log.d("msg:", webContent);
                URL url = new URL(webContent);
                HttpURLConnection conn = (HttpURLConnection) url.openConnection();
                conn.connect();
                InputStream is = conn.getInputStream();

                BufferedReader in = new BufferedReader(new InputStreamReader(is, "UTF-8"));
                StringBuffer sb = new StringBuffer("");
                String line = "";
                while ((line = in.readLine()) != null) {
                    sb.append(line);
                    break;
                }
                in.close();
                Log.d("FinalDotmons", sb.toString());
                return sb.toString();
                //value+=value;
            } catch (Exception e) {
                Log.e("log_tag", "Error in Display!" + e.getMessage());
                return "";
                // return new String("Exception: " + e.getMessage());
            }

        }


        public void onPostExecute(String output) {
            try {
                generalstate = output;
            } catch (Exception er) {
                Log.e("", "Sendsms.onPostExecute.Exception: output" + output + " /nError:" + er.toString());

            }
        }

        @Override
        public void onPreExecute() {

        }

        @Override
        protected String doInBackground(String... arg0) {
            Log.d("reading", "Do in background");
            //return "Exception Dotmons";
            return CoffeeOption(msg);
        }


    }

}
