import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CommentService {
  //URL da api
  apiUrl:string = 'http://localhost:8000/api/'

  constructor( public http: HttpClient ) { }

  //lista todos os comentarios
  getListComment(): Observable<any> {
    return this.http.get(this.apiUrl + 'listComment');
  }

  //lista os comentarios da republica dada
  getCommentByRepublic(republic_id): Observable<any> {
    return this.http.get(this.apiUrl + 'listComments/' + republic_id);
  }

  //adiciona um comentario
  postAddComment(form): Observable<any>{
    return(this.http.post(this.apiUrl + 'post', form));
  }

  //edita um comentario ja existente
  putUpdateComment(id, form): Observable<any> {
    return this.http.put(this.apiUrl + 'updateComment/' + id, form);
  }

  //deleta um comentario ja existente
  delDeleteComment(id:number): Observable<any> {
    return this.http.delete(this.apiUrl + 'deleteComment/' + id);
  }
}
