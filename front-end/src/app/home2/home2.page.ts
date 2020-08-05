import { Component, OnInit } from '@angular/core';
import { Storage } from '@ionic/storage';
import { Router } from '@angular/router';
import { SearchService } from '../services/search.service';

@Component({
  selector: 'app-home2',
  templateUrl: './home2.page.html',
  styleUrls: ['./home2.page.scss'],
})
export class Home2Page implements OnInit {
  public rent: boolean = false;
  public fav: boolean = false;
  public rate: boolean = false;

  public republicsArray = [];

  constructor( public searchService: SearchService, private router: Router ) { }

  ngOnInit() {
    this.listAllRepublics();
  }

  listAllRepublics() {
    this.searchService.getListRepublic().subscribe((res) => {
      this.republicsArray = res[0];
      console.log(this.republicsArray);
    });
  }

  //redireciona para a pagina da republica e guarda o json republic vindo do back no localStorage
  public redirectRepublic(republic) {
    localStorage.setItem('republic', JSON.stringify(republic));
    window.location.replace('/republic');
  }

  toRent() {
   this.rent = !this.rent;
  }

  toFav() {
   this.fav = !this.fav;
  }

  toRate() {
   this.rate = !this.rate;
  }
}
