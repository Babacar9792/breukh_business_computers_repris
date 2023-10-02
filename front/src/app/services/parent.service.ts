import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';
import { ResponseData } from '../interfaces/response-data';

@Injectable({
  providedIn: 'root'
})
export class ParentService {



  constructor(private Http: HttpClient) { }

  getAll<T>(uri: string): Observable<ResponseData<T>> {
    return this.Http.get<ResponseData<T>>(environment.api.url + uri);
  }

  get HTTP(): HttpClient {
    return this.Http;
  }
}
