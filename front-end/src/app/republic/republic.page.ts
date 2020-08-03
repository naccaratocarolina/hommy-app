import { Component, OnInit } from '@angular/core';
import { CommentService } from '../services/comment.service';

@Component({
  selector: 'app-republic',
  templateUrl: './republic.page.html',
  styleUrls: ['./republic.page.scss'],
})
export class RepublicPage implements OnInit {
  //array de comments
  commentsArray = [];

  constructor( public commentService: CommentService ) { }

  ngOnInit() {
    this.listComment();
  }

  listComment() {
    this.commentService.getListComment().subscribe((res) => {
      this.commentsArray = res[0];
      console.log(this.commentsArray);
    });
  }
}
