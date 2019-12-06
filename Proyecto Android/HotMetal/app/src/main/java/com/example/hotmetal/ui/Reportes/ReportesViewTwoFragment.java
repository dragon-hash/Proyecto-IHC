package com.example.hotmetal.ui.Reportes;

import androidx.lifecycle.ViewModelProviders;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.hotmetal.R;
import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.util.ArrayList;

public class ReportesViewTwoFragment extends Fragment {

    private ReportesViewTwoViewModel mViewModel;
    private BarChart barra;

    public static ReportesViewTwoFragment newInstance() {
        return new ReportesViewTwoFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.reportes_view_two_fragment, container, false);
        barra = (BarChart)view.findViewById(R.id.barras);
        barra.getDescription().setEnabled(false);
        setData(12);

        barra.setFitBars(true);



        return view;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = ViewModelProviders.of(this).get(ReportesViewTwoViewModel.class);
        // TODO: Use the ViewModel
    }

    private void setData(int count){
        ArrayList<BarEntry> yVals = new ArrayList<>();

        for (int i=0;i<count; i++){
            int value = (int)(Math.random()*50);
            yVals.add(new BarEntry(i,(int)value));
        }
        BarDataSet set=new BarDataSet(yVals, getString(R.string.barra_mes));
        set.setColors(ColorTemplate.MATERIAL_COLORS);
        set.setDrawValues(true);
        BarData data= new BarData(set);
        barra.setData(data);
        barra.invalidate();
        barra.animateY(500);
    }

}
