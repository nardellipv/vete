<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title"><i class="icon-files-empty position-left"></i> Siguiente turno</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <table class="table table-borderless table-xs content-group-sm">
                <tbody>
                <tr>
                    <td><i class="icon-briefcase position-left"></i> Project:</td>
                    <td class="text-right"><span class="pull-right"><a href="#">Singular app</a></span></td>
                </tr>
                <tr>
                    <td><i class="icon-alarm-add position-left"></i> Updated:</td>
                    <td class="text-right">12 May, 2015</td>
                </tr>
                <tr>
                    <td><i class="icon-alarm-check position-left"></i> Created:</td>
                    <td class="text-right">25 Feb, 2015</td>
                </tr>
                <tr>
                    <td><i class="icon-circles2 position-left"></i> Priority:</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">Highest <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><span class="status-mark position-left bg-danger"></span> Highest priority</a></li>
                                <li><a href="#"><span class="status-mark position-left bg-info"></span> High priority</a></li>
                                <li><a href="#"><span class="status-mark position-left bg-primary"></span> Normal priority</a></li>
                                <li><a href="#"><span class="status-mark position-left bg-success"></span> Low priority</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="icon-history position-left"></i> Revisions:</td>
                    <td class="text-right">29</td>
                </tr>
                <tr>
                    <td><i class="icon-file-plus position-left"></i> Added by:</td>
                    <td class="text-right"><a href="#">Winnie</a></td>
                </tr>
                <tr>
                    <td><i class="icon-file-check position-left"></i> Status:</td>
                    <td class="text-right">Published</td>
                </tr>
                </tbody>
            </table>

            <div class="panel-footer panel-footer-condensed">
                <div class="heading-elements">
                    <ul class="list-inline list-inline-condensed heading-text">
                        <li><a href="#" class="text-default"><i class="icon-pencil7"></i></a></li>
                        <li><a href="#" class="text-default"><i class="icon-bin"></i></a></li>
                    </ul>

                    <ul class="list-inline list-inline-condensed heading-text pull-right">
                        <li><a href="#" class="text-default"><i class="icon-statistics"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
                                <li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
                                <li><a href="#"><i class="icon-user-plus"></i> Assign users</a></li>
                                <li><a href="#"><i class="icon-warning2"></i> Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Siguientes Turnos</h6>
                <div class="heading-elements">
            <span class="heading-text"><i
                        class="icon-history text-warning position-left"></i> {{ date('d/m/Y') }}</span>
                    <span class="label bg-success heading-text">Online</span>
                </div>
            </div>


            <!-- Area chart -->
            <div id="messages-stats"></div>
            <!-- /area chart -->

            <!-- Tabs -->
            <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
                <li class="active">
                    <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('now')->isoFormat('LL') }}
                    </a>
                </li>

                <li>
                    <a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('tomorrow')->isoFormat('LL') }}
                    </a>
                </li>

                <li>
                    <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('+2 days')->isoFormat('LL') }}
                    </a>
                </li>

                <li>
                    <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('+3 days')->isoFormat('LL') }}
                    </a>
                </li>

                <li>
                    <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('+4 days')->isoFormat('LL') }}
                    </a>
                </li>

                <li>
                    <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                        {{ \Carbon\Carbon::parse('+5 days')->isoFormat('LL') }}
                    </a>
                </li>
            </ul>
            <!-- /tabs -->


            <!-- Tabs content -->
            <div class="tab-content">
                <div class="tab-pane active fade in has-padding" id="messages-tue">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                                <span class="badge bg-danger-400 media-badge">8</span>
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    James Alexander
                                    <span class="media-annotation pull-right">14:58</span>
                                </a>

                                <span class="display-block text-muted">The constitutionally inventoried precariously...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                                <span class="badge bg-danger-400 media-badge">6</span>
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Margo Baker
                                    <span class="media-annotation pull-right">12:16</span>
                                </a>

                                <span class="display-block text-muted">Pinched a well more moral chose goodness...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Jeremy Victorino
                                    <span class="media-annotation pull-right">09:48</span>
                                </a>

                                <span class="display-block text-muted">Pert thickly mischievous clung frowned well...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Beatrix Diaz
                                    <span class="media-annotation pull-right">05:54</span>
                                </a>

                                <span class="display-block text-muted">Nightingale taped hello bucolic fussily cardinal...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Richard Vango
                                    <span class="media-annotation pull-right">01:43</span>
                                </a>

                                <span class="display-block text-muted">Amidst roadrunner distantly pompously where...</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade has-padding" id="messages-mon">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Isak Temes
                                    <span class="media-annotation pull-right">Tue, 19:58</span>
                                </a>

                                <span class="display-block text-muted">Reasonable palpably rankly expressly grimy...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Vittorio Cosgrove
                                    <span class="media-annotation pull-right">Tue, 16:35</span>
                                </a>

                                <span class="display-block text-muted">Arguably therefore more unexplainable fumed...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Hilary Talaugon
                                    <span class="media-annotation pull-right">Tue, 12:16</span>
                                </a>

                                <span class="display-block text-muted">Nicely unlike porpoise a kookaburra past more...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Bobbie Seber
                                    <span class="media-annotation pull-right">Tue, 09:20</span>
                                </a>

                                <span class="display-block text-muted">Before visual vigilantly fortuitous tortoise...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Walther Laws
                                    <span class="media-annotation pull-right">Tue, 03:29</span>
                                </a>

                                <span class="display-block text-muted">Far affecting more leered unerringly dishonest...</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade has-padding" id="messages-fri">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Owen Stretch
                                    <span class="media-annotation pull-right">Mon, 18:12</span>
                                </a>

                                <span class="display-block text-muted">Tardy rattlesnake seal raptly earthworm...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Jenilee Mcnair
                                    <span class="media-annotation pull-right">Mon, 14:03</span>
                                </a>

                                <span class="display-block text-muted">Since hello dear pushed amid darn trite...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Alaster Jain
                                    <span class="media-annotation pull-right">Mon, 13:59</span>
                                </a>

                                <span class="display-block text-muted">Dachshund cardinal dear next jeepers well...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Sigfrid Thisted
                                    <span class="media-annotation pull-right">Mon, 09:26</span>
                                </a>

                                <span class="display-block text-muted">Lighted wolf yikes less lemur crud grunted...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                            </div>

                            <div class="media-body">
                                <a href="#">
                                    Sherilyn Mckee
                                    <span class="media-annotation pull-right">Mon, 06:38</span>
                                </a>

                                <span class="display-block text-muted">Less unicorn a however careless husky...</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs content -->

        </div>
    </div>
</div>



