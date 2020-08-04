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
  //pega o republic_id do localStorage
  republic_id = parseInt(localStorage.getItem('republic_id'));
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

  addComment(comment_form) {
    comment_form.value.republic_id = this.id_republic;
    console.log(comment_form);
    console.log(comment_form.value);

    this.commentService.postAddComment(comment_form.value).subscribe((res) => {
      console.log(res); //printa o objeto criado
      this.commentByRepublic(this.republic_id); //printa todas os comentarios da republica
    });
  }

  commentByRepublic(republic_id) {
    this.commentService.getCommentByRepublic(republic_id).subscribe((res) => {
      console.log(res);
      this.commentsArray = res;
      console.log(this.commentsArray);
    });
  }

  deleteComment(id) {
    this.commentService.delDeleteComment(id).subscribe((res) => {
      console.log(res); //mensagem de comentario deletado com sucesso printado
      this.commentByRepublic(this.republic_id); //printa o objeto deletado
    });
  }
}
