<?php

namespace frontend\controllers;

use common\models\Basic;
use common\models\Blog;
use common\models\Brandinfo;
use common\models\Brands;
use common\models\Brandsimage;
use common\models\CategoryServices;
use common\models\Clients;
use common\models\Comments;
use common\models\Districts;
use common\models\Experience;
use common\models\Images;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\Messages;
use common\models\Order;
use common\models\OrderProduct;
use common\models\OrderProductItem;
use common\models\Phone;
use common\models\Post;
use common\models\Products;
use common\models\Quarters;
use common\models\Questions;
use common\models\Services;
use common\models\User;
use common\models\Works;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\components\Cart;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $experience = Experience::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->one();
        $phoneNumber = Phone::find()->where(['status' => 1])->one();
        $works = Works::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $services = Services::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(4)->all();
        $clients = Clients::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $images = Images::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(4)->all();
        $products = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(4)->all();
        $basics = Basic::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->one();
        $brandInfos = Brandinfo::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->one();
        $questions = Questions::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->limit(5)->all();
        $brandImages = Brandsimage::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $brands = Brands::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();

        return $this->render(
            'index',
            [
                'experience' => $experience,
                'phoneNumber' => $phoneNumber,
                'works' => $works,
                'services' => $services,
                'clients' => $clients,
                'images' => $images,
                'products' => $products,
                'basics' => $basics,
                'brandInfos' => $brandInfos,
                'questions' => $questions,
                'brandImages' => $brandImages,
                'brands' => $brands,

            ]
        );
    }


    public function actionPost($id)
    {
        $blogs = Blog::find()->where(['status' => 1, 'id' => $id])->one();
        $phoneNumber = Phone::find()->where(['status' => 1])->one();
        $brandImages = Brandsimage::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $posts = Post::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $recentPosts = Blog::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $commentMessages = Comments::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();

        $comments = new Comments();

        if ($comments->load(Yii::$app->request->post())) {
            $comments->status = 1;
            if ($comments->save()) {
                $blogs->updateCounters(['comments' => 1]);
                return $this->redirect(Yii::$app->request->referrer);
            }
        }



        return $this->render(
            'post',
            [
                'blogs' => $blogs,
                'phoneNumber' => $phoneNumber,
                'brandImages' => $brandImages,
                'comments' => $comments,
                'posts' => $posts,
                'commentMessages' => $commentMessages,
                'recentPosts' => $recentPosts,

            ]
        );
    }




    public function actionDetail($id)
    {
        $services = Services::find()->where(['status' => 1, 'id' => $id])->orderBy(['id' => SORT_DESC])->limit(2)->all();
        $brandImages = Brandsimage::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $phoneNumber = Phone::find()->where(['status' => 1])->one();
        $catServices = CategoryServices::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();



        return $this->render(
            'detail',
            [
                'services' => $services,
                'brandImages' => $brandImages,
                'phoneNumber' => $phoneNumber,
                'catServices' => $catServices,
            ]
        );
    }

    public function actionChoose($id)
    {
        $services = Services::find()->where(['status' => 1, 'owner_id' => $id])->orderBy(['id' => SORT_DESC])->limit(2)->all();
        $brandImages = Brandsimage::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $phoneNumber = Phone::find()->where(['status' => 1])->one();
        $catServices = CategoryServices::find()->where(['status' => 1])->limit(7)->all();
        return $this->render(
            'detail',
            [
                'services' => $services,
                'brandImages' => $brandImages,
                'phoneNumber' => $phoneNumber,
                'catServices' => $catServices,
            ]
        );
    }



    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */


    /**
     * Displays about page.
     *
     * @return mixed
     */


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionChangLang()
    {
        $lang = Yii::$app->request->get('lang');
        Yii::$app->session->set('language', $lang);
        Yii::$app->language = $lang;
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionAddToCart($id)
    {
        Cart::addToCart($id);
        $result = [];
        if (Yii::$app->request->isAjax) {
            $result['count'] = Cart::count($id);
            $result['allCount'] = Cart::allcount();
            $cartProducts = Cart::products();
            $result['content'] = $this->renderAjax('@frontend/views/layouts/_header_cart', [
                'products' => $cartProducts
            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/shopping-cart/_order_table', [
                'products' => $cartProducts,
            ]);
            return $this->asJson($result);
        }
    }

    public function actionAddToCartShopping($id)
    {
        Cart::addToCart($id);
        $result = [];
        if (Yii::$app->request->isAjax) {
            $result['count'] = Cart::count($id);
            $result['allCount'] = Cart::allcount();
            $cartProducts = Cart::products();
            // $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();
            $result['content1'] = $this->renderAjax('@frontend/views/shopping-cart/index', [
                'products' => $cartProducts,
                // 'relatedProducts' => $relatedProducts,
            ]);
            return $this->asJson($result);
        }
    }

    public function actionPlusProduct($id)
    {
        Cart::addToCart($id);
        $result = [];

        if (Yii::$app->request->isAjax) {

            $result['count'] = Cart::count($id);
            $result['allCount'] = Cart::allcount();
            $result['productOneSum'] = Cart::productOneSum($id);
            $cartProducts = Cart::products();
            $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();

            $result['totalSum'] =  Cart::totalSum();
            // $result['content'] = $this->renderAjax('@frontend/views/shopping-cart/index', [
            //     'products' => $cartProducts,
            //     'relatedProducts' => $relatedProducts,
            // ]);

            return $this->asJson($result);
        }
    }

    public function actionMinusProduct($id)
    {
        if (Yii::$app->request->isAjax) {
            Cart::minusFromCart($id);
            $result = [];
            $products = Cart::products();
            $result['count'] = Cart::count($id);
            $result['allCount'] = Cart::allcount();
            $result['totalSum'] =  Cart::totalSum();
            $result['productOneSum'] = Cart::productOneSum($id);
            $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();

            $result['content'] = $this->renderAjax(
                '@frontend/views/shopping-cart/index',
                [
                    'products' => $products,
                    'relatedProducts' => $relatedProducts,
                ]
            );
        }
        return $this->asJson($result);
    }


    public function actionDelete($id)
    {
        $result = [];
        if (Yii::$app->request->isAjax) {
            Cart::deleteProduct($id);
            $products = Cart::products();
            $result['allCount'] = Cart::allcount();
            $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();
            $result['content'] = $this->renderAjax('@frontend/views/layouts/_header_cart', [
                'products' => $products,
            ]);
            $result['content1'] = $this->renderAjax('@frontend/views/shopping-cart/_order_table', [
                'products' => $products,
                'relatedProducts' => $relatedProducts,
            ]);

            return $this->asJson($result);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAjax()
    {

        $summa = Yii::$app->request->post('sum');
        if (Yii::$app->request->isAjax) {

            $_SESSION['asumma'] = $summa;

            print_r($_SESSION['asumma']);
            exit;
        }
    }



    public function actionAddress()
    {
        $id = Yii::$app->request->get('region_id');
        $district_option = '';
        if ($id) {         //checkout->index;//
            $districts = Districts::find()
                ->where(['region_id' => $id])
                ->all();
            if ($districts) {
                foreach ($districts as $item) {
                    $district_option .= "<option value='" . $item->id . "'>" . $item->name_uz . "</option>";
                }
            } else {
                $district_option .= "<option>-</option>";
            }
            return $this->asJson($district_option);
        }
    }

    public function actionDistrict()
    {
        $id = Yii::$app->request->get('district_id');
        $qauarters_option = '';
        $countQuarters = Quarters::find()
            ->where(['district_id' => $id])
            ->count();

        $qauarters = Quarters::find()
            ->where(['district_id' => $id])
            ->all();

        if ($countQuarters > 0) {
            foreach ($qauarters as $item) {
                $qauarters_option .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        } else {
            $qauarters_option .= "<option>-</option>";
        }
        return $this->asJson($qauarters_option);
    }

    public function actionSaveDb()
    {
        $userId = Yii::$app->user->id;
        $summa = Yii::$app->request->post('sum');
        $summa = $_SESSION['asumma'];
        $products = Cart::products();
        if ($products) {
            $orderProduct = new OrderProduct();
            $orderProduct->user_id = $userId;
            $orderProduct->total_sum = $summa + $_SESSION['sum'];
            if ($orderProduct->load(Yii::$app->request->post())) {
                if ($orderProduct->save()) {
                    foreach ($products as $product) {
                        $count = Cart::count($product->id);
                        $orderProductItem = new OrderProductItem();
                        $orderProductItem->order_product_id = $orderProduct->id;
                        $orderProductItem->product_id = $product->id;
                        $orderProductItem->title = $product->name;
                        $orderProductItem->price = $product->newcost;
                        $orderProductItem->count = $count;
                        $orderProductItem->save(false);
                    }
                    // Yii::$app->session->removeAll('cart');
                }
                return $this->redirect(['order/index', 'id' => $orderProduct->id]);
            }
        }

        return $this->redirect(['site/index']);
    }



    public function actionSearch()
    {
        $search = Yii::$app->request->get('val');
        $filter = Yii::$app->request->get('filter');

        if ($filter) {
            if ($filter == 'price-asc') {
                $query = Products::find()
                    ->joinWith('translation')
                    ->orderBy([
                        'newcost' => SORT_ASC
                    ])
                    ->andWhere(['like', 'products_lang.name', $search]);
            } else if ($filter == 'price-desc') {

                $query = Products::find()
                    ->joinWith('translation')
                    ->orderBy([
                        'newcost' => SORT_DESC
                    ])
                    ->andWhere(['like', 'products_lang.name', $search]);
            } else if ($filter == 'discount-desc') {
                $query = Products::find()
                    ->joinWith('translation')
                    ->orderBy([
                        'discount' => SORT_DESC
                    ]);
            } else if ($filter == 'discount-asc') {
                $query = Products::find()
                    ->orderBy(['discount' => SORT_ASC]);
            } else {
                $query = Products::find()
                    ->joinWith('translation')
                    ->andWhere(['like', 'products_lang.name', $search]);
            }
        } else {
            $query = Products::find()
                ->joinWith('translation')
                ->andWhere(['like', 'products_lang.name', $search]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ]
        ]);

        $products = $dataProvider->models;

        return $this->render(
            '@frontend/views/product/search',
            [
                'products' => $products,
                'dataProvider' => $dataProvider,
            ]
        );
    }


    public function actionFind()
    {
        $search = Yii::$app->request->get('find');

        if ($search) {
            $blogs = Blog::find()
                ->joinWith('translation')
                ->andWhere(['like', 'title', $search])->all();
            return $this->render(
                'search',
                [
                    'blogs' => $blogs,
                ]
            );

            // return $this->redirect(Yii::$app->request->referrer);
        }
    }
    public function actionSign()
    {

        return $this->render('sign');
    }
}
