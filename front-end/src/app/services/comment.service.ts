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

  getListComment(): Observable<any> {
    return this.http.get(this.apiUrl + 'listComment');
  }

  getCommentByRepublic(republic_id): Observable<any> {
    return this.http.get(this.apiUrl + 'listComments/' + republic_id);
  }

  postAddComment(form): Observable<any>{
    return(this.http.post(this.apiUrl + 'post', form));
  }

  putUpdateComment(id, form): Observable<any> {
    return this.http.put(this.apiUrl + 'updateComment/' + id, form);
  }

  delDeleteComment(id:number): Observable<any> {
    return this.http.delete(this.apiUrl + 'deleteComment/' + id);
  }
}
