import {Injectable} from '@angular/core';
import {Storage} from '@ionic/storage-angular'

@Injectable({
  providedIn: 'root'
})
export class StorageService {

  private _storage: Storage | null = null;

  constructor(private storage: Storage) {
    this.init();
  }

  async init() {
    this._storage = await this.storage.create();
  }

  public async set(key: string, value: any) {
    return this._storage?.set(key, value);
  }

  public async get(key: string) {
    return this._storage?.get(key);
  }

  public async storageContext() {
    return this._storage
  }

  public async remove(key: string) {
    return this._storage?.remove(key);
  }

  public async clear() {
    return this._storage?.clear();
  }

}
