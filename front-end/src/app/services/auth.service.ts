import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
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

  //registra um novo user
  public postRegister(form): Observable<any> {
    return this.http.post(this.apiUrl + 'register', form, this.httpHeaders);
  }

  //loga um user ja existente
  public postLogin(form): Observable<any> {
    return this.http.post(this.apiUrl + 'login', form, this.httpHeaders);
  }

  //pega a authorization do user logado
  public getUser(): Observable<any> {
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem('token');
    return this.http.get( this.apiUrl + 'getuser', this.httpHeaders);
  }

  //desloga um user autenticado
  public getLogout(): Observable<any> {
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem('token');
    return this.http.get(this.apiUrl + 'logout', this.httpHeaders);
  }
}
