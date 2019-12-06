package com.example.hotmetal.ui.Automoviles;

import androidx.fragment.app.FragmentTransaction;
import androidx.lifecycle.ViewModelProviders;

import android.content.Intent;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.hotmetal.DashboardActivity;
import com.example.hotmetal.PrincipalActivity;
import com.example.hotmetal.R;
import com.example.hotmetal.RegistroActivity;

public class CarrosIndexFragment extends Fragment {

    private CarrosIndexViewModel mViewModel;

    public static CarrosIndexFragment newInstance() {
        return new CarrosIndexFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        return inflater.inflate(R.layout.carros_index_fragment, container, false);
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = ViewModelProviders.of(this).get(CarrosIndexViewModel.class);
        // TODO: Use the ViewModel
    }



}
