package com.example.yasha.hclstraighttalk;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

public class Dashboard extends AppCompatActivity {

    String navArray[] = {"NETWORKING OPPORTUNITIES", "ADVICE FROM PEERS", "LATEST CAREER MOVES", "LATEST TECHNOLOGY", "CAREER OPPORTUNITY"};
    String[] txt = {

            "NETWORKING OPPORTUNITIES",
            "ADVICE FROM PEERS",
            "LATEST CAREER MOVES",
            "LATEST TECHNOLOGY",
            "CAREER OPPORTUNITY"
    };
    Integer[] imageId = {
            R.drawable.netopportunity,                          //images corresponding to different events will be present against
            R.drawable.peeradvice,                            //the respective names in the list.
            R.drawable.careermove,
            R.drawable.technology,
            R.drawable.careeroppor
    };


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);
        com.example.yasha.hclstraighttalk.Notification adapter = new com.example.yasha.hclstraighttalk.Notification(Dashboard.this, txt, imageId);
        System.out.println();
        ListView listView = (ListView) findViewById(R.id.dash_board);
        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int position, long id) {
                switch (position) {
                    case 0:
                        Intent i = new Intent(Dashboard.this, netoppor.class);
                        startActivity(i);
                         break;
                   /* case 1:
                        Intent playItOnActivity = new Intent(Dashboard.this, PlayItOn.class);
                        startActivity(playItOnActivity);
                        break;
                    case 2:
                        Intent roboTilesActivity = new Intent(Dashboard.this, Coderz.class);
                        startActivity(roboTilesActivity);*/
                }
            }
        });
    }
}
