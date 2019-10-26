import Vue from 'vue'
import Router from 'vue-router'
import {routes as routes} from '../app/index'
import {beforeEach, beforeResolve, afterEach} from './beforeEach'

Vue.use(Router);

const router = new Router({
	routes: routes,
});

router.beforeEach(beforeEach);
router.beforeResolve(beforeResolve);
router.afterEach(afterEach);

export default router;