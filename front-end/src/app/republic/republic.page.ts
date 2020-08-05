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
  republic_id:number; //var que vai armazenar o republic_id do json do localStorage
  //variaveis do listComment
  commentsArray = []; //array de comments
  //variaveis do addComment
  comment_form: FormGroup;
  //variaveis do commentByRepublic
  republic:any; //armazena a rep dona do comment
  comments = []; //armazena um array de comments referente a republica
  //variaveis do updateComment
  comment_edit_form: FormGroup;
  //variaveis do getCommentId
  comment_id:number; //var que vai armazenar o id do comment
  text_edit:string = ''; //nova variavel de texto para editar um comentario
  canEdit:boolean = false; //var de controle do form

  constructor( public commentService: CommentService, public formbuilder: FormBuilder ) {
    //pega o republic_id do localStorage
    this.republic_id = JSON.parse(localStorage.getItem('republic')).id;

    //inicializa os forms e valida os inputs
    this.comment_form = this.formbuilder.group({
      text: ['', [Validators.required]]
    	});

    this.comment_edit_form = this.formbuilder.group({
      text: ['', [Validators.required]]
    });
  }

  ngOnInit() {
    this.listComment();
  }

  listComment() {
    this.commentService.getListComment().subscribe((res) => {
      this.commentsArray = res[0]; //res[0] pq o back ta retornando um objeto de objetos
      console.log(this.commentsArray);
    });
  }

  addComment(comment_form) {
    comment_form.value.republic_id = this.republic_id;
    console.log(comment_form);
    console.log(comment_form.value);

    this.commentService.postAddComment(comment_form.value).subscribe((res) => {
      console.log(res); //printa o objeto criado
      this.comment_form.reset(); //reseta o form
      this.commentByRepublic(this.republic_id); //printa todas os comentarios da republica
    });
  }

  commentByRepublic(republic_id) {
    this.commentService.getCommentByRepublic(republic_id).subscribe((res) => {
      console.log(res);
      this.republic = res.republic; //pega a republica dona do comentario
      console.log(this.republic);
      this.comments = res.comments; //pega um array de comentarios da republica
      console.log(this.comments);
    });
  }

  updateComment(comment_edit_form) {
    console.log(comment_edit_form);
    console.log(comment_edit_form.value);
    this.canEdit = false;
    this.commentService.putUpdateComment(this.comment_id, comment_edit_form.value).subscribe((res) => {
      console.log(res);
      this.text_edit = '';
      this.comment_edit_form.reset();
      this.commentByRepublic(this.republic_id);
    });
  }

  getCommentId(id) {
    console.log(id);
    this.comment_id = id;
    console.log(this.comment_id);
    for(let comment of this.comments) {
      if(comment.id === id) { //seleciona o comment com o id dado
        this.text_edit = comment.text;
      }
    }
    //muda inverte o valor da var de controle
    this.canEdit = true;
  }

  deleteComment(id) {
    this.commentService.delDeleteComment(id).subscribe((res) => {
      console.log(res); //mensagem de comentario deletado com sucesso printado
      this.commentByRepublic(this.republic_id); //printa o objeto deletado
    });
  }
}
