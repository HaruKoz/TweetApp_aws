# TweetApp
フレームワークを使用せず、プレーンなPHPで作成したTwitter風Webアプリケーションです。

# 使用技術
PHP/7.2.34

HTML

CSS

Apache/2.4.54

MariaDB/10.2.38

JavaScript(jQuery)

AWS(IAM, VPC, EC2, Route53, Certificate Manager)

CircleCI

# 機能一覧
- サインアップ
- ログイン、ログアウト
- ツイート（投稿、削除）
- いいね
- おすすめユーザー表示
- アカウント設定編集

# 工夫した点
- VSCodeでLintツール（PHP Intelephense、CSS Formatter）を用い、コードを綺麗に保つよう心掛けた。
- GitHubとCircleCIを連携させ、開発環境からgit pushしテスト成功後自動的にEC2へデプロイされるようにした。
- JavaScript(jQuery)による演出効果
    - いいねボタン押下時のハートの色、いいね数の変化
    - ツイート削除時のモーダルウィンドウのアニメーション
    - ユーザ毎のツイート一覧←→いいね一覧の切り替え時の見出し文字のボーダー移動のアニメーション
- 各種入力項目のバリデーションチェック
    - 必須入力チェック、文字列長チェック、半角英数字チェック、画像ファイルの拡張子チェック
    - Validationクラスに上記チェックの関数をまとめ、各種入力項目のクラスに継承させることでコードの保守性に配慮

# インフラ構成
![infrastructure](https://tweetapp.harukoz.com/assets/infrastructure.png)

# 開発環境
Mac mini(M1, 2020)

macOS Monterey(12.6) 
