<?php

declare(strict_types=1); ?>

<!-- ヘッダー -->
<?php require_once(dirname(__DIR__) . "/template/header.php") ?>

<div class="clearfix">
  <!-- メニュー -->
  <?php require_once(dirname(__DIR__) . "/template/menu.php") ?>

  <div id="main">
    <h3 id="title">社員登録画面</h3>

    <div id="input_area">
      <form action="input.php" method="POST">
        <p><strong>社員情報を入力してください。全て必須です。</strong></p>
        <?php //メッセージ表示 
        ?>
        <?php //例)社員名を入力してください。 
        ?>
        <?php //例)社員名は50文字以内で入力してください。 
        ?>
        <?php //例)生年月日を正しく入力してください。 
        ?>
        <?php //例)性別を選択してください。 
        ?>
        <?php //例)XXXXXを入力してください。 
        ?>
        <?php //例)登録完了しました。 
        ?>
        <?php if ($errorMessage !== '') { ?>
          <p class="error_message"><?php echo $errorMessage; ?></p>
        <?php } ?>
        <?php //例)削除完了しました。 
        ?>
        <?php if ($successMessage !== '') { ?>
          <p class="success_message"><?php echo $successMessage; ?></p>
        <?php } ?>

        <?php //各入力項目表示 
        ?>
        <table>
          <tbody>
            <tr>
              <td>社員番号</td>
              <?php //(新規登録時)社員番号入力可 
              ?>
              <?php //(更新時)社員番号入力不可 
              ?>
              <td>
                <?php if ($isEdit === false) { ?>
                  <input type="text" name="id"
                    value="<?php echo htmlspecialchars($id); ?>" />
                <?php } else { ?>
                  <input type="text" name="id"
                    value="<?php echo htmlspecialchars($id); ?>" disabled />
                  <input type="hidden" name="id"
                    value="<?php echo htmlspecialchars($id); ?>" />
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td>社員名</td>
              <td><input type="text" name="name"
                  value="<?php echo htmlspecialchars($name); ?>" /></td>
            </tr>
            <tr>
              <td>社員名カナ</td>
              <td><input type="text" name="name_kana"
                  value="<?php echo htmlspecialchars($nameKana); ?>" /></td>
            </tr>
            <tr>
              <td>生年月日</td>
              <td><input type="date" name="birthday"
                  value="<?php echo htmlspecialchars($birthday); ?>" /></td>
            </tr>
            <tr>
              <td>性別</td>
              <td>
                <?php foreach (GENDER_LISTS as $value) { ?>
                  <input type="radio" name="gender" value="<?php echo $value; ?>"
                    <?php echo $gender === $value ? "checked" : ""; ?>>
                  <?php echo $value; ?>
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td>部署</td>
              <td>
                <select name="organization">
                  <?php foreach (ORGANIZATION_LISTS as $value) { ?>
                    <option value="<?php echo $value; ?>"
                      <?php echo $organization === $value ? "selected" : ""; ?>>
                      <?php echo $value; ?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>役職</td>
              <td>
                <select name="post">
                  <?php foreach (POST_LISTS as $value) { ?>
                    <option value="<?php echo $value; ?>"
                      <?php echo $post === $value ? "selected" : ""; ?>>
                      <?php echo $value; ?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>入社年月日</td>
              <td><input type="date" name="start_date"
                  value="<?php echo htmlspecialchars($startDate); ?>" /></td>
            </tr>
            <tr>
              <td>電話番号(ハイフン無し)</td>
              <td><input type="text" name="tel"
                  value="<?php echo htmlspecialchars($tel); ?>" /></td>
            </tr>
            <tr>
              <td>メールアドレス</td>
              <td><input type="text" name="mail_address"
                  value="<?php echo htmlspecialchars($mailAddress); ?>" /></td>
            </tr>
          </tbody>
        </table>
        <div class="clearfix">
          <div class="input_area_right">
            <input type="hidden" name="save" value="1" />
            <input type="hidden" name="edit"
              value="<?php echo $isEdit === true ? "1" : ""; ?>" />
            <input type="submit" id="input_button" value="登録">
            <input type="button" id="back_button" value="戻る" onclick="location.href='search.php'; return false;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- フッター -->
<?php require_once(dirname(__DIR__) . "/template/footer.php") ?>
