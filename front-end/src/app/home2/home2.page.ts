import { Component, OnInit } from '@angular/core';
import { SearchService } from '../services/search.service';

@Component({
  selector: 'app-home2',
  templateUrl: './home2.page.html',
  styleUrls: ['./home2.page.scss'],
})
export class Home2Page implements OnInit {
  public republicsArray = [];

  constructor(public searchService: SearchService) { }

  ngOnInit() {
    this.listAllRepublics();
  }

  listAllRepublics() {
    this.searchService.getListRepublic().subscribe((res) => {
      this.republicsArray = res[0];
      console.log(this.republicsArray);
    });
  }
}
