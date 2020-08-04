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
  public select = -1;

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

  public redirectRepublic(id) {
    localStorage.setItem('republic_id', id);
    this.router.navigate(['/republic', {republic_id: id}]);
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
