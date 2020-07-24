import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-republic-scroll-bar',
  templateUrl: './republic-scroll-bar.component.html',
  styleUrls: ['./republic-scroll-bar.component.scss'],
})
export class RepublicScrollBarComponent implements OnInit {
  public arrayRepublicas = [
    {
      name: 'Republica 1',
      image_1: 'rep_1_1.png',
      image_2: 'rep_1_2.png',
      image_3: 'rep_1_3.png',
      street: 'Rua 1',
      number: 1,
      neighborhood: 'Bairro 1',
      city: 'Rio de Janeiro',
      category: 'Apartamento',
      rental_per_month: 1232,
      footage:100,
      number_bath: 2,
      number_bed: 3,
      parking: 'Sim',
      animals: 'Não'
    },
    {
      name: 'Republica 2',
      image_1: 'rep_2_1.png',
      image_2: 'rep_2_2.png',
      image_3: 'rep_2_3.png',
      street: 'Rua 2',
      number: 2,
      neighborhood: 'Bairro 2',
      city: 'Rio de Janeiro',
      category: 'Apartamento',
      rental_per_month: 3432,
      footage:200,
      number_bath: 2,
      number_bed: 3,
      parking: 'Não',
      animals: 'Sim'
    },
    {
      name: 'Republica 3',
      image_1: 'rep_3_1.png',
      image_2: 'rep_3_2.png',
      image_3: 'rep_3_3.png',
      street: 'Rua 3',
      number: 3,
      neighborhood: 'Bairro 3',
      city: 'Rio de Janeiro',
      category: 'Apartamento',
      rental_per_month: 3432,
      footage:300,
      number_bath: 1,
      number_bed: 1,
      parking: 'Sim',
      animals: 'Sim'
    }
    ,
    {
      name: 'Republica 4',
      image_1: 'rep_3_1.png',
      image_2: 'rep_3_2.png',
      image_3: 'rep_3_3.png',
      street: 'Rua 4',
      number: 4,
      neighborhood: 'Bairro 4',
      city: 'Rio de Janeiro',
      category: 'Apartamento',
      rental_per_month: 3432,
      footage:300,
      number_bath: 1,
      number_bed: 1,
      parking: 'Não',
      animals: 'Não'
    }
  ];

  constructor() { }

  ngOnInit() {}

}
