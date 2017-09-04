            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <div class="radio-button-group">
                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                            <span class="radio-button__text">Все задачи</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Повестка дня</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Завтра</span>
                        </label>

                        <label class="radio-button">
                            <input class="radio-button__input visually-hidden" type="radio" name="radio">
                            <span class="radio-button__text">Просроченные</span>
                        </label>
                    </div>

                    <label class="checkbox">
                        <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox">
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    <?php if(isset($tasks_array)): ?>
                        <?php foreach ($tasks_array as $k => $v): ?>
                            <tr class="tasks__item task <?= ($v['complete'] == 'yes') ? 'task--completed' : '' ?>">
                                <td class="task__select">
                                    <label class="checkbox task__checkbox">
                                        <input class="checkbox__input visually-hidden" type="checkbox">
                                        <span class="checkbox__text"><?= htmlentities($v['task-item']) ?></span>
                                    </label>
                                </td>
                                <td class="task__date">
                                    <?= htmlentities($v['task-date']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </main>