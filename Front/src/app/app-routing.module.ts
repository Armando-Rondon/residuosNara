import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () =>
      import('./home/home.module').then((m) => m.HomePageModule),
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full',
  },
  {
    path: 'residuos/:id/new',
    loadChildren: () =>
      import('./residuos/residuo-new/residuo-new.module').then(
        (m) => m.ResiduoNewPageModule
      ),
  },
  {
    path: 'residuos/:id/edit',
    loadChildren: () =>
      import('./residuos/residuo-edit/residuo-edit.module').then(
        (m) => m.ResiduoEditPageModule
      ),
  },
  {
    path: 'residuos/:residuoId',
    loadChildren: () =>
      import('./residuos/residuo-detail/residuo-detail.module').then(
        (m) => m.ResiduoDetailPageModule
      ),
  },
  {
    path: 'iniciar-sesion',
    loadChildren: () => import('./iniciar-sesion/iniciar-sesion.module').then( m => m.IniciarSesionPageModule)
  },
  {
    path: 'registar',
    loadChildren: () => import('./registar/registar.module').then( m => m.RegistarPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
