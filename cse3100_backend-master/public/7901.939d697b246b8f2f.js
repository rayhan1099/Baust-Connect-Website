"use strict";(self.webpackChunkapp=self.webpackChunkapp||[]).push([[7901],{7901:(q,d,a)=>{a.r(d),a.d(d,{LoginPageModule:()=>I});var u=a(9808),r=a(4182),t=a(2159),l=a(2281),c=a(655),o=a(1269),m=a(7053),f=a(1188),h=a(6231);function v(n,s){1&n&&(o.TgZ(0,"span"),o._uU(1,"This field is required"),o.qZA())}function Z(n,s){1&n&&(o.TgZ(0,"span"),o._uU(1,"The input is invalid"),o.qZA())}function P(n,s){if(1&n&&(o.TgZ(0,"div",12),o.YNc(1,v,2,0,"span",13),o.YNc(2,Z,2,0,"span",13),o.qZA()),2&n){const e=o.oxw();o.xp6(1),o.Q6J("ngIf",null==e.emailorid||null==e.emailorid.errors?null:e.emailorid.errors.required),o.xp6(1),o.Q6J("ngIf",null==e.emailorid||null==e.emailorid.errors?null:e.emailorid.errors.emailorid)}}function L(n,s){1&n&&(o.TgZ(0,"span"),o._uU(1,"Password is required"),o.qZA())}function T(n,s){1&n&&(o.TgZ(0,"span"),o._uU(1,"Password needs to be 8 characters"),o.qZA())}function w(n,s){if(1&n&&(o.TgZ(0,"div",12),o.YNc(1,L,2,0,"span",13),o.YNc(2,T,2,0,"span",13),o.qZA()),2&n){const e=o.oxw();o.xp6(1),o.Q6J("ngIf",null==e.password||null==e.password.errors?null:e.password.errors.required),o.xp6(1),o.Q6J("ngIf",null==e.password||null==e.password.errors?null:e.password.errors.minlength)}}let g=(()=>{class n{constructor(e,i,p,A,x,U){this.fb=e,this.authService=i,this.router=p,this.activeRoute=A,this.storageService=x,this.events=U,this.credentials=new r.cw({})}get emailorid(){return this.credentials.get("emailorid")}get password(){return this.credentials.get("password")}ngOnInit(){this.authService.isLoggedIn(!0).then(i=>{"true"===i&&this.router.navigateByUrl(this.activeRoute.snapshot.queryParams.returnTo||"/admin/dashboard",{replaceUrl:!0})}),this.credentials=this.fb.group({emailorid:["",[r.kI.required,r.kI.minLength(9),r.kI.maxLength(9)]],password:["",[r.kI.required,r.kI.minLength(8)]]})}login(){return(0,c.mG)(this,void 0,void 0,function*(){this.authService.login(this.credentials.value,!0).subscribe(e=>{e&&(this.storageService.set("loggedInAdmin","true"),this.storageService.set("userProfile",e.data),this.router.navigateByUrl(this.activeRoute.snapshot.queryParams.returnTo||"/admin/dashboard",{replaceUrl:!0}),this.events.publishEvent({update_menu_admin:e.data}))})})}}return n.\u0275fac=function(e){return new(e||n)(o.Y36(r.qu),o.Y36(m.$),o.Y36(l.F0),o.Y36(l.gz),o.Y36(f.V),o.Y36(h.h))},n.\u0275cmp=o.Xpm({type:n,selectors:[["app-login"]],decls:27,vars:4,consts:[["color","primary"],["slot","start"],["size-lg","4","size-md","3","size-xs","12"],[1,""],["ion-text","",1,"white"],[3,"formGroup","ngSubmit"],[1,"input-group"],["formControlName","emailorid","placeholder","Admin ID","type","text"],["class","errors",4,"ngIf"],["formControlName","password","placeholder","Password","type","password"],["expand","block","type","submit",3,"disabled"],["color","light"],[1,"errors"],[4,"ngIf"]],template:function(e,i){1&e&&(o.TgZ(0,"ion-header")(1,"ion-toolbar",0)(2,"ion-buttons",1),o._UZ(3,"ion-menu-button"),o.qZA(),o.TgZ(4,"ion-title"),o._uU(5,"admin login"),o.qZA()()(),o.TgZ(6,"ion-content")(7,"ion-grid")(8,"ion-row"),o._UZ(9,"ion-col",2),o.TgZ(10,"ion-col",3)(11,"h1",4),o._uU(12,"Admin Login"),o.qZA(),o.TgZ(13,"p",4),o._uU(14,"Login to your account"),o.qZA(),o.TgZ(15,"form",5),o.NdJ("ngSubmit",function(){return i.login()}),o.TgZ(16,"div",6)(17,"ion-item"),o._UZ(18,"ion-input",7),o.qZA(),o.YNc(19,P,3,2,"div",8),o.TgZ(20,"ion-item"),o._UZ(21,"ion-input",9),o.qZA(),o.YNc(22,w,3,2,"div",8),o.qZA(),o.TgZ(23,"ion-button",10),o._uU(24,"Log in"),o.qZA(),o.TgZ(25,"ion-text",11),o._uU(26,"Forgot password? Contact dev. team"),o.qZA()()()()()()),2&e&&(o.xp6(15),o.Q6J("formGroup",i.credentials),o.xp6(4),o.Q6J("ngIf",((null==i.emailorid?null:i.emailorid.dirty)||(null==i.emailorid?null:i.emailorid.touched))&&(null==i.emailorid?null:i.emailorid.errors)),o.xp6(3),o.Q6J("ngIf",((null==i.password?null:i.password.dirty)||(null==i.password?null:i.password.touched))&&i.password.errors),o.xp6(1),o.Q6J("disabled",!i.credentials.valid))},directives:[t.Gu,t.sr,t.Sm,t.fG,t.wd,t.W2,t.jY,t.Nd,t.wI,r._Y,r.JL,r.sg,t.Ie,t.pK,t.j9,r.JJ,r.u,u.O5,t.YG,t.yW],styles:["ion-content[_ngcontent-%COMP%]{--padding-top: 10%;--background: url(https://images.unsplash.com/photo-1536431311719-398b6704d4cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80) 0 0/100% 100% no-repeat}form[_ngcontent-%COMP%]{max-width:400px;align-items:center}.input-group[_ngcontent-%COMP%]{background:#fff;border-radius:10px;overflow:hidden;margin-bottom:15px}.errors[_ngcontent-%COMP%]{font-size:small;color:#fff;background:var(--ion-color-danger);padding-left:15px;padding-top:5px;padding-bottom:5px}.white[_ngcontent-%COMP%]{color:#fff}"]}),n})();const b=[{path:"",component:g},{path:"logout",component:g}];let y=(()=>{class n{}return n.\u0275fac=function(e){return new(e||n)},n.\u0275mod=o.oAB({type:n}),n.\u0275inj=o.cJS({imports:[[l.Bz.forChild(b)],l.Bz]}),n})(),I=(()=>{class n{}return n.\u0275fac=function(e){return new(e||n)},n.\u0275mod=o.oAB({type:n}),n.\u0275inj=o.cJS({imports:[[u.ez,r.u5,t.Pc,y,r.UX]]}),n})()}}]);