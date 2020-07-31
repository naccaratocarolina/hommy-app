import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-republic-scroll-bar',
  templateUrl: './republic-scroll-bar.component.html',
  styleUrls: ['./republic-scroll-bar.component.scss'],
})

export class RepublicScrollBarComponent implements OnInit {
  public rent: boolean = false;
  public fav: boolean = false;
  public rate: boolean = false;
  @Input() republic;

  constructor() { }

  ngOnInit() { }

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
