package com.example.hotmetal.ui.Facturas;

import androidx.lifecycle.ViewModelProviders;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.hotmetal.R;

public class FacturasIndexFragment extends Fragment {

    private FacturasIndexViewModel mViewModel;

    public static FacturasIndexFragment newInstance() {
        return new FacturasIndexFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        return inflater.inflate(R.layout.facturas_index_fragment, container, false);
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = ViewModelProviders.of(this).get(FacturasIndexViewModel.class);
        // TODO: Use the ViewModel
    }

}
