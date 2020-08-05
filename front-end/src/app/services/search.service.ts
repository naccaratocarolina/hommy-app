import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SearchService {
  //rota do back-end
  apiUrl: string = 'http://localhost:8000/api/';

  constructor(public http:HttpClient) { }

  //lista todas as republicas
  getListRepublic(): Observable<any> {
    return this.http.get(this.apiUrl + 'listRepublic');
  }
}
