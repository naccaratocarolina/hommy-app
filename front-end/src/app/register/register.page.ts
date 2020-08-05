import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthService } from "../services/auth.service";
import { IonicStorageModule } from "@ionic/storage";

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {
  //declarando a variavel do tipo form builder
  register_form: FormGroup;

  constructor( public authService: AuthService, public formbuilder: FormBuilder, public router: Router ) {
    //inicializando o form e validando seus campos
    this.register_form = this.formbuilder.group({
      name: ['', [Validators.required]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(8)]]
    });
  }

  ngOnInit() {
  }

  register(register_form) {
    if(register_form.status == "VALID") { //se os dados preenchidos do form passarem no validador
      this.authService.postRegister(register_form.value).subscribe((res) => {
        console.log(res);
        //salva token, name e email no localStorage
        //n esquecer de nunca salvar o password no storage haha
        localStorage.setItem('token', res.data.token);
        localStorage.setItem('user_name', res.data.user.name);
        localStorage.setItem('user_email', res.data.user.email);
        //apos o registro, navega para a home
        this.router.navigate(['/home2']);
      });
    }
  }

}
