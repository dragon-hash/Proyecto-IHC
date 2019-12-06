package com.example.hotmetal.ui.Citas;

import androidx.lifecycle.ViewModelProviders;

import android.graphics.Color;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.example.hotmetal.MyCustomDialog;
import com.example.hotmetal.R;
import com.github.mikephil.charting.charts.PieChart;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;
import com.github.mikephil.charting.data.PieEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.util.ArrayList;

public class CitasReservarFragment extends Fragment {

    private CitasReservarViewModel mViewModel;
    private Button mOpenDialog;


    public static CitasReservarFragment newInstance() {
        return new CitasReservarFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.citas_reservar_fragment, container, false);
        mOpenDialog = view.findViewById(R.id.reservar);
        
        mOpenDialog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.d("CitasReservarFragment", "onclick: opening dialog");

                MyCustomDialog dialog = new MyCustomDialog();
                dialog.show(getFragmentManager(), "MyCustomDialog");
            }
        });





        return view;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = ViewModelProviders.of(this).get(CitasReservarViewModel.class);
        // TODO: Use the ViewModel
    }

}
