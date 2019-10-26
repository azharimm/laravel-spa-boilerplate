import store from '../vuex'
import localforage from 'localforage'
import NProgress from 'nprogress';
import '../../../node_modules/nprogress/nprogress.css'

export const beforeEach = ((to, from, next) =>{
	store.dispatch('auth/checkTokenExists').then(()=>{
		if(to.meta.guest){
			next({name:'home'});
			return;
		}
		next();
	}).catch(()=>{
		if(to.meta.needsAuth){
			localforage.setItem('inteded',to.name);
			next({name:'login'});
			return;
		}
		next();
	})
});

export const beforeResolve = ((to, from, next) => {
	if (to.name) {
		NProgress.start()
	}
	next()
  })
  
export const afterEach = ((to, from) => {
	NProgress.done()
  })
