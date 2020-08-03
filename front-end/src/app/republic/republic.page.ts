import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { CommentService } from '../services/comment.service';

@Component({
  selector: 'app-republic',
  templateUrl: './republic.page.html',
  styleUrls: ['./republic.page.scss'],
})
export class RepublicPage implements OnInit {
  //array de comments
  commentsArray = [];
  //var que vai armazenar o republic_id
  republic_id: number;
  //formulario
  comment_form: FormGroup;

  constructor( public commentService: CommentService, public formbuilder: FormBuilder ) {
    this.comment_form = this.formbuilder.group({
    			text: ['', [Validators.required]]
    	});
  }

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
