import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CommentService {
  //rota do back-end
  apiUrl: string = 'http://localhost:8000/api/';

  //headers do programa
  httpHeaders: object = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    }
  }

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
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem('token');
    return this.http.post(this.apiUrl + 'post', form, this.httpHeaders);
  }

  //edita um comentario ja existente
  putUpdateComment(id, form): Observable<any> {
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem('token');
    return this.http.put(this.apiUrl + 'updateComment/' + id, form, this.httpHeaders);
  }

  //deleta um comentario ja existente
  delDeleteComment(id:number): Observable<any> {
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem('token');
    return this.http.delete(this.apiUrl + 'deleteComment/' + id, this.httpHeaders);
  }
}
