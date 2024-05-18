import {Injectable} from '@angular/core';
import {GlobalConstant} from "../GlobalConstant";
import {HttpClient} from "@angular/common/http";
import {HttpConfigInterceptor} from "../interceptor/httpconfig.interceptor";
import {StorageService} from "./storage.service";
import {LoaderService} from "./loader.service";
import {catchError} from "rxjs/operators";

@Injectable({
  providedIn: 'root'
})
export class HomepageService {

  private completePath: string;
  private apiRoot = GlobalConstant.apiUrl;
  private path = 'homepage';
  private csrf = 'sanctum/csrf-cookie'
  private siteRoot = GlobalConstant.siteRoot;

  constructor(private httpClient: HttpClient,
              private httpconfig: HttpConfigInterceptor,
              private storageService: StorageService,
              private loaderService: LoaderService) {
    this.completePath = this.apiRoot + this.path
  }

  search(body){
    return this.httpClient.post(this.completePath + '/search', body)
      .pipe(
        catchError(this.httpconfig.handleError<any>('home search error occurred'))
      )
  }
}
