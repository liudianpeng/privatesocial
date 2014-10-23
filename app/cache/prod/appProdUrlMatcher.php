<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/avshare/admin')) {
            // avshare_admin_member
            if (rtrim($pathinfo, '/') === '/avshare/admin/member') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_avshare_admin_member;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'avshare_admin_member');
                }

                return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\MemberController::indexAction',  '_route' => 'avshare_admin_member',);
            }
            not_avshare_admin_member:

            if (0 === strpos($pathinfo, '/avshare/admin/resource')) {
                // avshare_admin_resource
                if (rtrim($pathinfo, '/') === '/avshare/admin/resource') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_avshare_admin_resource;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'avshare_admin_resource');
                    }

                    return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::indexAction',  '_route' => 'avshare_admin_resource',);
                }
                not_avshare_admin_resource:

                // avshare_admin_resource_create
                if ($pathinfo === '/avshare/admin/resource/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_avshare_admin_resource_create;
                    }

                    return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::createAction',  '_route' => 'avshare_admin_resource_create',);
                }
                not_avshare_admin_resource_create:

                // avshare_admin_resource_new
                if ($pathinfo === '/avshare/admin/resource/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_avshare_admin_resource_new;
                    }

                    return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::newAction',  '_route' => 'avshare_admin_resource_new',);
                }
                not_avshare_admin_resource_new:

                // avshare_admin_resource_show
                if (preg_match('#^/avshare/admin/resource/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_avshare_admin_resource_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_admin_resource_show')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::showAction',));
                }
                not_avshare_admin_resource_show:

                // avshare_admin_resource_edit
                if (preg_match('#^/avshare/admin/resource/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_avshare_admin_resource_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_admin_resource_edit')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::editAction',));
                }
                not_avshare_admin_resource_edit:

                // avshare_admin_resource_update
                if (preg_match('#^/avshare/admin/resource/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_avshare_admin_resource_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_admin_resource_update')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::updateAction',));
                }
                not_avshare_admin_resource_update:

                // avshare_admin_resource_delete
                if (preg_match('#^/avshare/admin/resource/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_avshare_admin_resource_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_admin_resource_delete')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\AVShare\\Admin\\ResourceController::deleteAction',));
                }
                not_avshare_admin_resource_delete:

            }

        }

        // welcome
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_welcome;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'welcome');
            }

            return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\DefaultController::indexAction',  '_route' => 'welcome',);
        }
        not_welcome:

        if (0 === strpos($pathinfo, '/av')) {
            if (0 === strpos($pathinfo, '/avshare')) {
                if (0 === strpos($pathinfo, '/avshare/list')) {
                    // avshare_list
                    if (rtrim($pathinfo, '/') === '/avshare/list') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_avshare_list;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'avshare_list');
                        }

                        return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\ListController::indexAction',  '_route' => 'avshare_list',);
                    }
                    not_avshare_list:

                    // avshare_show
                    if (preg_match('#^/avshare/list/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_avshare_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_show')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\ListController::showAction',));
                    }
                    not_avshare_show:

                }

                if (0 === strpos($pathinfo, '/avshare/picture')) {
                    // avshare_picture
                    if (rtrim($pathinfo, '/') === '/avshare/picture') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_avshare_picture;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'avshare_picture');
                        }

                        return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\PictureController::indexAction',  '_route' => 'avshare_picture',);
                    }
                    not_avshare_picture:

                    // avshare_picture_upload
                    if ($pathinfo === '/avshare/picture/upload') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_avshare_picture_upload;
                        }

                        return array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\PictureController::uploadAction',  '_route' => 'avshare_picture_upload',);
                    }
                    not_avshare_picture_upload:

                    // avshare_picture_show
                    if (preg_match('#^/avshare/picture/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_avshare_picture_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avshare_picture_show')), array (  '_controller' => 'Slackiss\\Bundle\\AVShareBundle\\Controller\\PictureController::showAction',));
                    }
                    not_avshare_picture_show:

                }

            }

            if (0 === strpos($pathinfo, '/avid/log')) {
                if (0 === strpos($pathinfo, '/avid/login')) {
                    // fos_user_security_login
                    if ($pathinfo === '/avid/login') {
                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                    }

                    // fos_user_security_check
                    if ($pathinfo === '/avid/login_check') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_security_check;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                    }
                    not_fos_user_security_check:

                }

                // fos_user_security_logout
                if ($pathinfo === '/avid/logout') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        if (0 === strpos($pathinfo, '/e')) {
            // ef_connect
            if ($pathinfo === '/efconnect') {
                return array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElfinderController::loadAction',  '_route' => 'ef_connect',);
            }

            // elfinder
            if ($pathinfo === '/elfinder') {
                return array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElfinderController::showAction',  '_route' => 'elfinder',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
