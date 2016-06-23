<input type="password" class="hide"/>
<input id="jump" value="<?php echo $jump;?>" type="hidden">
<form id="registerform" method="post" action="/passport/addpassport">
    <section data-role="page" id="registerOne" data-title="方橙-最专业的招商选址大数据平台" class="contain register">
        <header data-role="header" data-theme="b" class="header">
            <h1>注册方橙</h1>
        </header>
        <scetion class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div id="mobile" for="input" validate-item="mobile" class="form-item">
                    <div validate-ok="mobile" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-mobile">*手机号码：</label>
                        <div class="flex flex100">
                        	<input validate-blur validate-success="mobileSuccess()" validate-field="mobile" required-msg="请输入您的手机号" mobile-msg="请输入有效的手机号" uniqueMobile-msg="手机号已被占用，如有疑问请拨打400 0038 150" validate-type="required,mobile,uniqueMobile" type="tel" name="passport_mobile" class="text-input" maxlength="11" placeholder="请输入手机号"/>
                        </div>
                    </div>
                    <div validate-msg="mobile" class="hide tip">
                    </div>
                </div>
                <div class="layout form-item">
					<div for="input" id="codeField" validate-item="smscode" class="flex layout layout-column">
						<div validate-ok="smscode" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
							<label class="text-label text-label-mobile">*验证码：</label>
							<div class="flex flex100">
								<input validate-blur validate-field="smscode" required-msg="请输入验证码" sms-msg="验证码输入错误" validate-type="required,sms" data-mobile="" name="mobileCode" type="number" class="text-input" placeholder="请输入验证码"/>
							</div>

						</div>
						<div validate-msg="smscode" class="hide tip"></div>
					</div>
					<div class="codeBox btn_box">
						<input id="sendSmsBtn" type="button" class="btn" value="获取验证码" data-role="none"/>
					</div>
					
				</div>
                <div id="password" for="input" validate-item="password" class="form-item">
                    <div validate-ok="password" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-password">*登录密码：</label>
                        <div class="flex flex100">
                            <input validate-blur validate-field="password" required-msg="密码不能为空" password-msg="密码为6-16位，不能包含空格，不能为纯数字" validate-type="required,password" type="password" name="passport_password" class="text-input" maxlength="16" placeholder="设置登录密码" autocomplete="off"/>
                        </div>
                        <span id="login-pwdToggle" class="input-aide input-pwdToggle">显示</span>
                    </div>
                    <div validate-msg="password" class="hide tip">
                    </div>
                    <div class="hide tip successTip">
                        密码为6-16位，不能包含空格，不能为纯数字
                    </div>
                </div>
                <div id="identity" class="form-item form-item-job" validate-item="identity">
                    <p class="gray999 font-size-13">*您的职场身份：</p>
                    <div class="layout form-item-checkbox form-item-gender">
                        <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="3">
                            <i class="check_bg"></i>
                            <div class="check_tit">总部<br>招商</div>
                        </div>
                        <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="2">
                            <i class="check_bg"></i>
                            <div class="check_tit">项目<br>招商</div>
                        </div>
                        <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="1">
                            <i class="check_bg"></i>
                            <div class="check_tit">品牌<br>选址</div>
                        </div>
                        <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="4">
                            <i class="check_bg"></i>
                            <div class="check_tit">第三方</div>
                        </div>
                    </div>
					<div validate-msg="identity" class="hide tip">
                        请选择您的职场身份
                    </div>
                    <input id="identity_value" type="hidden" validate-field="identity" validate-type="checked" name="passport_type" value=""/>
                </div>
                <div id="agree" validate-item="agree" class="form-item form-reg-argen">
                    <div class="layout">
                        <div class="check_auto">
                            <span class="checked">同意</span>
                            <input validate-field="agree" validate-type="checked" type="hidden" value="1"/>
                        </div>
                        <a href="#" data-toggle="modal" custom-dialog="#regAgreement">《方橙用户协议、隐私权政策》</a>
                    </div>
                    <div validate-msg="agree" class="hide tip">
                        注册需同意《用户协议、隐私权政策》
                    </div>
                </div>
                <div class="btn_box form-item layout">
                    <a id="nextStep" class="btn btn_full_able layout layout-align-center-center">下一步</a>
                </div>
            </div>
        </scetion>
    </section>
    <!-- 注册协议 -->
    <div id="regAgreement" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myModalLabel" class="modal-title">用户协议、隐私权政策</h4>
                </div>
                <div class="modal-body">
                    <div class="reg_info_mesage">
                        <p>欢迎您注册成为方橙的会员用户！</p>
                        <p>请仔细阅读本服务条款和隐私政策，接受本协议并继续完成注册。</p>
                        <p>1、协议的确认和接纳</p>
                        <p>方橙的各项服务的所有权和运作权归方橙互联网科技有限公司（以下简称为方橙网或方橙科技）。方橙提供的服务将完全按照其发布的章程、服务条款和操作规则严格执行。用户完全完成注册程序，便成为方橙的注册用户，将得到一个密码和帐号，同时此协议即时生效。用户有义务保证密码和帐号的安全，并不得将账号转交他人。用户对利用该密码和帐号所进行的一切活动负全部责任；因此所衍生的任何损失或损害，方橙无法也不承担任何责任。</p>
                        <p>2、注册义务</p>
                        <p>方橙运用自己的系统通过国际互联网为用户提供网络服务。同时，用户必须：</p>
                        <p>2.1　自行配备上网的所需设备，包括个人电脑、调制解调器、手机或其他必备上网装置；</p>
                        <p>2.2　自行负担个人上网所支付的与此服务有关的电话费用、网络费用。</p>
                        <p>2.3　方橙为用户提供服务，用户在使用方橙提供的服务时需提供真实身份信息，并对自己在方橙的行为、言论负责。</p>
                        <p>为了能使用本服务，您同意以下事项：</p>
                        <p>2.4　依本服务注册表的提示提供您本人真实、正确、最新及完整的资料；</p>
                        <p>2.5　维持更新您个人用户信息，确保其真实、正确、最新及完整。若您提供任何错误、不实、过时或不完整的资料，并为方橙确知，或者方橙有合理的理由怀疑前述资料为错误、不实、过时或不完整，方橙有权暂停或终止您的帐号，并拒绝您于现在和未来使用方橙全部或部分的服务。</p>
                        <p>2.6　您提供的注册信息不得冒用他人信息或侵犯他人合法权益。方橙有权暂停或终止帐号，并有权追究相关责任人的法律责任。</p>
                        <p>2.7　您注册的用户名不能侵犯他人合法权益，不能对他人名誉权造成侵犯。方橙有权收回对方橙或者他人合法权益有侵犯嫌疑的帐号。</p>
                        <p>3、用户信息的收集、管理与保护</p>
                        <p>您已知悉且同意，在您注册方橙帐号或使用方橙提供的服务时，方橙将记录您提供的相关个人信息，如：姓名、手机号码等，上述个人信息是您获得方橙提供服务的基础。同时，基于优化用户体验之目的，方橙会获取与提升方橙服务有关的其他信息，例如当您访问方橙时，我们可能会收集哪些服务的受欢迎程度、浏览器软件信息等以便优化我们的服务。</p>
                        <p>为了向您提供更好的服务或产品，方橙会在下述情形使用您的个人信息：</p>
                        <p>3.1　根据相关法律法规的要求；</p><p>3.2　根据您的授权；</p>
                        <p>3.3　根据方橙相关服务条款、应用许可使用协议的约定；</p>
                        <p>3.4　根据为帮助您达成商业任务，将您的个人信息中的必要内容展现给其他方橙用户。</p>
                        <p>此外，您已知悉并同意：在现行法律法规允许的范围内，方橙可能会将您非隐私的个人信息用于市场营销，使用方式包括但不限于：在方橙平台中向您展示或提供广告和促销资料，向您通告或推荐方  橙的服务或产品信息，以及其他此类根据您使用方橙服务或产品的情况所认为您可能会感兴趣的信息。其中也包括您在采取授权等某动作时选择分享的信息，例如当您关注某个购物中心或某个品牌。</p>
                        <p>未经您本人允许，方橙不会向任何第三方披露您的个人信息，下列情形除外：</p>
                        <p>3.5　方橙已经取得您或您监护人的授权；</p>
                        <p>3.6　司法机关或行政机关给予法定程序要求方橙披露的；</p>
                        <p>3.7　方橙为维护自身合法权益而向用户提起诉讼或仲裁时；</p>
                        <p>3.8　根据您与方橙相关服务条款、应用许可使用协议的约定；</p>
                        <p>3.9　法律法规规定的其他情形。</p>
                        <p>方橙将尽一切合理努力保护其获得的用户个人信息。为防止用户个人信息在意外的、未经授权的情况下被非法访问、复制、修改、传送、遗失、破坏、处理或使用，方橙已经并将继续采取以下措施保护您的个人信息：</p>
                        <p>3.10　以适当的方式对用户的个人信息进行加密处理；</p>
                        <p>3.11　在适当的位置使用密码对用户个人信息进行保护；</p>
                        <p>3.12　限制对用户个人信息的访问；</p>
                        <p>3.13　其他的合理措施</p>
                        <p>尽管已经采取了上述合理有效措施，并已经遵守了相关法律规定要求的标准，但方橙仍然无法保证您的个人信息通过不安全途径进行交流时的安全性。因此，用户个人应采取积极措施保证个人信息的安全，如：定期修改帐号密码，不将自己的帐号密码等个人信息透露给他人。</p>
                        <p>您知悉：方橙提供的个人信息保护措施仅适用于方橙平台，一旦您离开方橙，浏览或使用其他网站、服务及内容资源，方橙即没有能力及义务保护您在方橙以外的网站提交的任何个人信息，无论您登录或浏览上述网站是否基于方橙的链接或引导。</p>
                        <p>当您完成方橙的帐号注册后，您可以查阅或修改您提交给方橙的个人信息。一般情况下，您可随时浏览、修改自己提交的信息，但出于安全性和身份识别（如号码申诉服务）的考虑，您可能无法修改注册时提供的某些初始注册信息及验证信息。</p>
                        <p>为了达成商业任务，您可能需要向方橙提交相关信息，方橙拥有这些信息的商业使用权。</p><p>4、使用规则</p><p>用户单独承担发布内容的责任。用户对服务的使用是根据所有适用于方橙的国家法律、地方法律和国际法律标准的。</p>
                        <p>用户必须遵循：</p>
                        <p>4.1　从中国境内向外传输技术性资料时必须符合中国有关法规；</p>
                        <p>4.2　使用网络服务不作非法用途；</p>
                        <p>4.3　不干扰或混乱网络服务；</p>
                        <p>4.4　遵守所有使用网络服务的网络协议、规定、程序和惯例。</p>
                        <p>4.5　用户的密码和帐号遭到未授权的使用或发生其他任何安全问题，用户可以立即通知方橙，并且用户在每次连线结束，应结束帐号使用，否则用户可能得不到方橙的安全保护。</p>
                        <p>4.6　禁止用户从事以下行为：</p>
                        <p>4.6.1　上传、粘贴、发送或传送任何非法、反动、淫秽、粗俗、猥亵的，胁迫、骚扰、中伤他人、诽谤、侵害他人隐私或诋毁他人名誉或商誉的，种族歧视、危害未成年人或其他不适当的信息或电子邮件，包括但不限于资讯、资料、文字、软件、音乐、照片、图形、信息或其他资料（以下简称内容）。</p>
                        <p>4.6.2　未经方橙许可的广告行为。</p>
                        <p>4.6.3　冒充任何人或机构，或以虚伪不实的方式谎称或使人误认为与任何人或任何机构有关。</p>
                        <p>4.6.4　伪造标题或以其他方式操控识别资料，使人误认为该内容为方橙所传送。</p>
                        <p>4.6.5　上传、粘贴、发送电子邮件或以其它方式传送无权传送的内容（例如内部资料、机密资料）。</p>
                        <p>4.6.6　上传、粘贴、发送电子邮件或以其它方式传送侵犯任何人的专利、商标、著作权、商业秘密或其他专属权利之内容。</p>
                        <p>4.6.7　在方橙提供的专供粘贴广告的区域之外，上传、粘贴、发送电子邮件或以其他方式传送广告函件、促销资料、“垃圾邮件”等。</p>
                        <p>4.6.8　上传、粘贴、发送电子邮件或以其他方式传送有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料。</p>
                        <p>4.6.9　干扰或破坏本服务或与本服务相连的服务器和网络，或不遵守本服务协议之规定。</p>
                        <p>4.6.10　故意或非故意违反任何相关的中国法律、法规、规章、条例等其他具有法律效力的规范。</p>
                        <p>4.6.11　跟踪或以其他方式骚扰他人。</p>
                        <p>4.6.12　其它被方橙视为不适当的行为。</p>
                        <p>另外，用户对经由本服务上传、粘贴、发送电子邮件或传送的内容负全部责任；对于经由本服务而传送的内容，方橙不保证前述内容的正确性、完整性或品质。用户在接受本服务时，有可能会接触到令人不快、不适当或令人厌恶的内容。在任何情况下，方橙均不对任何内容负责，包括但不限于任何内容发生任何错误或纰漏以及衍生的任何损失或损害。方橙有权（但无义务）自行拒绝或删除经由本服务提供的任何内容。用户使用上述内容，应自行承担风险。</p>
                        <p>方橙有权利在下述情况下，对内容进行保存或披露：</p>
                        <p>4.7　法律程序所规定；</p>
                        <p>4.8　本服务条款规定；</p>
                        <p>4.9　被侵害的第三人提出权利主张；</p>
                        <p>4.10　为保护方橙、其使用者及社会公众的权利、财产或人身安全；</p>
                        <p>4.11　其他方橙认为有必要的情况。</p>
                        <p>5、服务内容</p>
                        <p>5.1　方橙的产品或服务的具体内容由方橙根据实际情况提供。</p>
                        <p>5.2　除非本服务协议另有其它明示规定，方橙所推出的新产品、新功能、新服务，均受到本服务协议之规范。</p>
                        <p>5.3　鉴于网络服务的特殊性（包括但不限于服务器的稳定性问题、恶意的网络攻击等行为的存在及其他方橙无法控制的情形），用户同意方橙有权随时中断或终止部分或全部的产品或服务（包括收费网络服务），若发生该等中断或中止产品或服务的情形，方橙将尽可能及时通过网页公告、系统通知、私信、短信提醒或其他合理方式通知受到影响的用户。如中断或终止的产品或服务属于收费服务，方橙将该用户剩余虚拟货币退还用户的虚拟货币账户或向受影响的用户提供等值的替代性的收费网络服务。</p>
                        <p>5.4　方橙需要定期或不定期地对提供网络服务的平台或相关的设备进行检修或者维护，如因此类情况而造成网络服务（包括收费网络服务）在合理时间内的中断，方橙无需为此承担任何责任。方橙保留不经事先通知为维修保养、升级或其它目的暂停本服务任何部分的权利。</p>
                        <p>5.5　方橙或第三人可提供与其它国际互联网上之网站或资源之链接。由于方橙无法控制这些网站及资源，您了解并同意，此类网站或资源是否可供利用，方橙不予负责，存在或源于此类网站或资源之任何内容、广告、产品或其它资料，方橙亦不予保证或负责。因使用或依赖任何此类网站或资源发布的或经由此类网站或资源获得的任何内容、商品或服务所产生的任何损害或损失，方橙不承担任何责任。</p>
                        <p>5.6　用户明确同意其使用方橙的产品或服务所存在的风险将完全由其自己承担。用户理解并接受下载或通过方橙取得的任何信息资料取决于用户自己，理解并接受利用方橙网站上展示的信息用于商业决策取决于自己，并自行承担随之而来的风险。方橙对在服务网上得到的招商、选址、招聘信息等，不作担保。</p>
                        <p>5.7　用户对网络服务的使用承担风险。方橙对此不作任何类型的担保，不论是明确的或隐含的，但是不对商业性的隐含担保、特定目的和不违反规定的适当担保作限制。</p>
                        <p>5.8　如发生下列任何一种情形，方橙有权随时中断或终止向用户提供本协议项下的方橙服务（包括收费服务）而无需对用户或任何第三方承担任何责任：</p>
                        <p>5.8.1　用户提供的个人资料不真实；</p>
                        <p>5.8.2　用户违反法律法规国家政策或本协议中规定的使用规则；</p>
                        <p>5.8.3　用户在使用收费服务时未按规定为其所使用的收费服务实现支付目的。</p>
                        <p>5.9　如用户在申请开通方橙服务后在任何连续90日内未实际使用，则方橙有权选择采取以下任何一种方式进行处理：</p>
                        <p>5.9.1　回收用户昵称；</p>
                        <p>5.9.2　停止为该用户提供方橙服务。</p>
                        <p>5.10　方橙有权于任何时间暂时或永久修改或终止本服务（或其任何部分），而无论其通知与否，方橙对用户和任何第三人均无需承担任何责任。</p>
                        <p>5.11　有限责任</p>
                        <p>方橙对任何直接、间接、偶然、特殊及继起的损害不负责任，这些损害可能来自：使用不正当网络服务，在网上购买商品或进行同类型服务，在网上进行交易，非法使用网络服务或用户传送的信息有所变动。</p><p>5.12　侵权责任</p>
                        <p>网络用户利用网络侵害他人民事权益的，应当承担侵权责任。</p>
                        <p>网络用户利用网络服务实施侵权行为的，在被侵权人以书面形式通知方橙相关侵权行为、并提供相关证据的情况下，方橙有权采取删除、屏蔽、断开链接等必要措施以防止侵权结果的扩大。</p><p>5.13　终止服务</p>
                        <p>用户有义务不时关注并阅读最新版的协议及网站公告。方橙有权在必要时修改服务条款。方橙服务条款一旦发生变动，将会在重要页面上提示所修改的内容。如果不同意所改动的内容，用户可以主动取消获得的网络服务。如果用户继续享用网络服务，则视为接受服务条款的变动。方橙保留随时修改或中断服务而不需照知用户的权利。方橙行使修改或中断服务的权利，不需对用户或第三方负责。用户对后来的条款修改有异议，或对方橙的服务不满，可以行使如下权利：</p>
                        <p>5.13.1　停止使用方橙的网络服务；</p>
                        <p>5.13.2　通告方橙停止对该用户的服务。结束用户服务后，用户使用网络服务的权利马上中止。从那时起，用户没有权利，方橙也没有义务传送任何未处理的信息或未完成的服务给用户或第三方。</p><p>6、知识产权</p>
                        <p>6.1　方橙是方橙平台的所有权及知识产权权利人。</p>
                        <p>6.2　方橙是方橙平台产品的所有权及知识产权权利人。上述方橙产品指的是方橙、或其关联公司、或其授权主体等通过方橙平台为用户提供的包括但不限于信息发布分享、关系链拓展、便捷辅助工具、平台应用程序、公众开放平台等功能、软件、服务等。</p>
                        <p>6.3　方橙是方橙平台及方橙产品中所有信息内容的所有权及知识产权权利人。前述信息内容包括但不限于程序代码、界面设计、版面框架、数据资料、账号、文字、图片、图形、图表、音频、视频等，除按照法律法规规定应由相关权利人享有权利的内容以外。</p>
                        <p>6.4　用户在使用方橙平台的过程中，可能会使用到由第三方针对方橙服务开发的在方橙平台运行的功能、软件或服务，用户除遵守本协议相关规定以外，还应遵守第三方相关规定，并尊重第三方权利人对其功能、软件、服务及其所包含内容的相关权利。</p>
                        <p>6.5　鉴于以上，用户理解并同意：</p>
                        <p>6.5.1　未经方橙及相关权利人同意，用户不得对上述功能、软件、服务进行反向工程 （reverse engineer）、反向编译（decompile）或反汇编（disassemble）等；不得使用人工或机器的方式，批量复制方橙上的内容或资料，用于其他商业用途；同时，不得将上述内容或资料在任何媒体直接或间接发布、播放、出于播放或发布目的而改写或再发行，或者用于其他任何目的。</p>
                        <p>6.5.2　在尽商业上的合理努力的前提下，方橙并不就上述功能、软件、服务及其所包含内容的延误、不准确、错误、遗漏或由此产生的任何损害，以任何形式向用户或任何第三方承担任何责任；</p>
                        <p>6.5.3　方橙并不对上述任何由第三方提供的功能、软件、服务或内容进行任何保证性的、或连带性的承诺或担保，由此产生的任何纠纷、争议或损害，由用户与第三方自行解决，方橙不承担任何责任；</p><p>6.5.4　为更好地维护方橙生态，方橙保留在任何时间内以任何方式处置上述由方橙享受所有权及知识产权的产品或内容，包括但不限于修订、屏蔽、删除或其他任何法律法规允许的处置方式。</p>
                        <p>7、关于手机服务</p>
                        <p>7.1　方橙为用户提供方橙手机短信服务。一旦用户在注册本服务的过程输入自己的手机号码和保护码并完成登记注册程序，则表明用户愿意接受方橙发送的短信，此服务为免信息费服务，方橙不向用户收取任何费用，用户主动发送的短信产生的费用，由用户向移动运营商支付，与方橙无关。若用户通过注册并使用了方橙的收费短信服务，则表示用户同意通过运营商支付信息费给方橙，此服务产生的信息费由运营商代为收取。手机短信服务的具体收费说明见具体服务的相应页面。</p>
                        <p>7.2　方橙为用户提供手机上网服务，其站点为（http://www.fangcheng.cn）以及和方橙合作的合作站点。用户上网产生可能产生的流量费，由用户向运营商支付，与方橙无关。</p>
                        <p>7.3　方橙不承担用户由于手机故障、欠费、丢失、借用或盗用后他人利用手机订购方橙短信息服务而遭受的损失或并非由于方橙的原因而导致的任何其它损失。对于用户出国并使用国际漫游服务但未取消已定制的短信息服务，或者在国际漫游状态下继续使用短信息点播服务，用户应当承担相关所有费用，方橙不承担任何责任。</p>
                        <p>7.4　用户自己承担系统受损或资料丢失的所有风险和责任。方橙对于删除和存储数据失败并不负有任何责任。</p>
                        <p>7.5　如因方橙的过错，导致用户接收到错误的信息并支付了不应支付的信息费，方橙的全部责任仅限于赔偿用户因错误信息而支付的信息费。</p>
                        <p>8、免责声明</p>
                        <p>8.1　用户在使用方橙服务的过程中应遵守国家法律法规及政策规定，因其使用方橙服务而产生的行为后果由用户自行承担。</p>
                        <p>8.2　方橙对于本服务包含的或用户经由或从任何与本服务有关的途径所获得的任何内容、信息或广告，不声明或保证其正确性或可靠性；并且对于用户经本服务上的广告、展示而购买、取得的任何产品、信息或资料，方橙不负保证责任。用户自行承担担使用本服务的风险。</p>
                        <p>8.3　方橙有权但无义务，改善或更正本服务任何部分之任何疏漏、错误。</p>
                        <p>8.4　方橙不保证以下事项（包括但不限于）：</p>
                        <p>8.4.1　本服务适合用户的使用要求；</p>
                        <p>8.4.2　本服务不受干扰，及时、安全、可靠或不出现错误；</p>
                        <p>8.4.3　用户经由本服务取得的任何产品、服务或其他材料符合用户的期望；</p>
                        <p>8.4.4　用户使用经由本服务下载的或取得的任何资料，其风险自行负担；因该使用而导致用户电脑系统损坏或资料流失，用户应负完全责任；</p><p>8.4.5　对基于以下原因而造成的利润、商业信誉、资料的损失或其他有形或无形损失，方橙不承担任何直接、间接、附带、衍生或惩罚性的赔偿；</p>
                        <p>8.4.6　服务使用或无法使用；</p>
                        <p>8.4.7　经由本服务购买或取得的任何产品、资料或服务；</p>
                        <p>8.4.8　用户资料遭到未授权的使用或修改；</p>
                        <p>8.4.9　其他与本服务相关的事宜。</p>
                        <p>8.5　用户在浏览网际网路时自行判断使用方橙的对外连接。该对外连接可能会引导用户进入到被认为具有攻击性或不适当的网站，方橙没有义务查看对外连接所指向的网站的内容，因此，对其正确性、合法性、正当性不负任何责任。</p>
                        <p>8.6　用户同意，对于方橙向用户提供的各项网络服务的质量缺陷本身及其引发的任何损失，方橙无需承担任何责任：</p>
                        <p>8.7  用户同意：在任何场合，若因方橙或方橙员工个人原因导致将标的价格标识远低于该标的在方橙网站内的过往价格时（若无过往价格，以同公司同地段或同行业同地段标的价格为准），视为重大误解，方橙有权解除合同并不承担违约责任，尽快无息返还客户所提交的货款，不适用定金罚则。此错误标识行为不被视为促销行为。</p>
                        <p>低于标的在方橙网站内的过往价格超过5%的情形（若无过往价格，低于同公司同地段或同行业同地段标的价格超过5%的情形）适用本条约束。</p>
                        <p>例如：标价300万的商品房，被错误标识为低于285万的，适用本条约束，方橙有权解除合同并不承担违约责任。</p>
                        <p>8.8  用户同意：因银行、第三方支付平台等非方橙原因导致货款无法实际到帐、被扣押等情形，方橙有权解除合同并不承担违约责任，尽快无息返还客户所提交的货款，不适用定金罚则。</p>
                        <p>9、协议修改</p>
                        <p>9.1　方橙有权随时修改本协议的任何条款，一旦本协议的内容发生变动，方橙将会在方橙网站上公布修改之后的协议内容，若用户不同意上述修改，则可以选择停止使用方橙服务。方橙也可选择通过其他适当方式（比如系统通知）向用户通知修改内容。</p>
                        <p>9.2　如果不同意方橙对本协议相关条款所做的修改，用户有权停止使用方橙服务。如果用户继续使用方橙服务，则视为用户接受方橙对本协议相关条款所做的修改。</p>
                        <p>10、通知送达</p>
                        <p>10.1　本协议项下方橙对于用户所有的通知均可通过网页公告、电子邮件、系统通知、微信服务号主动联系、私信、手机短信或常规的信件传送等方式进行；该等通知于发送之日视为已送达收件人。</p>
                        <p>10.2　用户对于方橙的通知应当通过方橙对外正式公布的通信地址、传真号码、电子邮件地址等联系信息进行送达。</p>
                        <p>11、法律适用</p>
                        <p>11.1　网络服务条款要与中华人民共和国的法律解释相一致，用户和方橙一致同意服从法院所管辖。如发生方橙服务条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户产生法律效力和影响。</p>
                        <p>如双方就本协议内容或其执行发生任何争议，双方应尽量友好协商解决；协商不成时，任何一方均可向方橙所在地的人民法院提起诉讼。</p>
                        <p>11.2　在任何情况下，方橙用户不得利用方橙进行违反或可能违反国家法律和法规的言论或行为，否则，方橙可在任何时候不经任何事先通知终止向您提供服务。并且用户对自己的言论或行为负责。</p>
                        <p>11.3　用户应遵守以下法律及法规：</p>
                        <p>11.3.1　用户同意遵守《中华人民共和国保守国家秘密法》、《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》、《中华人民共和国侵权责任法》、信息产业部2000年10月8日第4次部务会议通过的《互联网电子公告服务管理规定》、《互联网新闻信息服务管理规定》、《北京市微博客发展管理若干规定》以及《全国人大常委会关于加强网络信息保护的决定》等有关计算机及互联网规定的法律和法规、实施办法。在任何情况下，方橙合理地认为用户的行为可能违反上述法律、法规，方橙可以在任何时候，不经事先通知终止向该用户提供服务。</p>
                        <p>11.3.2　用户应了解国际互联网的无国界性，应特别注意遵守当地所有有关的法律和法规。</p>
                        <p>12、其他规定</p>
                        <p>12.1　本协议构成双方对本协议之约定事项及其他有关事宜的完整协议，除本协议规定的之外，未赋予本协议各方其他权利。</p>
                        <p>12.2　如本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍应有效并且有约束力。</p>
                        <p>12.3　本协议中的标题仅为方便而设，在解释本协议时应被忽略。</p>

                    </div>
                </div>
                <div class="modal-footer" style="background-color: #FFFFFF;">
                    <div class="btn_box">
                        <button type="button" data-dismiss="modal" class="btn btn-default btn-orange btn-close close">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section data-role="page" id="registerTwo" data-title="方橙-最专业的招商选址大数据平台" class="contain register">
        <header data-role="header" data-theme="b" class="header">
            <a href="#registerOne" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
            <h1>基本信息</h1>
        </header>
        <scetion class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div id="username" validate-item="username" class="form-item">
                    <div class="layout form-item-uname">
                        <div for="input" validate-ok="username" class="form-input-wrapper form-item-fistName layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-firstName">*姓：</label>
                            <input validate-field="username" validate-type="required" type="text" onkeyup="commonUtilInstance.normal_word(this);" name="passport_first_name" class="text-input" maxlength="10" placeholder="您的姓"/>
                        </div>
                        <div for="input" validate-ok="username" class="form-input-wrapper form-item-secondName layout layout-align-start-center ui-field-contain flex">
                            <label class="text-label text-label-second">*名：</label>
                            <input validate-field="username" validate-type="required" type="text" onkeyup="commonUtilInstance.normal_word(this);" name="passport_last_name" class="text-input" maxlength="10" placeholder="您的名"/>
                        </div>
                    </div>
                    <div validate-msg="username" class="hide tip">
                        请输入您的姓名
                    </div>
                </div>
                <div id="city" validate-item="city" class="form-item">
                    <div validate-ok="city" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*所在地：</label>
                        <a class="custom-select-header flex layout layout-align-start-center">
                            <div class="custom-select-name"><span>选择城市</span></div>
                        </a>
                        <i class="caret_right"></i>
                        <input validate-field="city" validate-type="required" type="hidden" name="area_id"/>
                    </div>
                    <div validate-msg="city" class="hide tip">
                        请选择所在城市
                    </div>
                </div>
                <div id="company" for="input" validate-item="company" class="form-item">
                    <div validate-ok="company" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*公司名称：</label>
                        <input validate-field="company" validate-type="required" type="text" onkeyup="commonUtilInstance.company_word(this);"name="passport_company" class="text-input" maxlength="50" placeholder="请输入您的公司名称"/>
                    </div>
                    <div validate-msg="company" class="hide tip">
                        请输入您的公司名称
                    </div>
                </div>
                <div id="job" for="input" validate-item="job" class="form-item">
                    <div validate-ok="job" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*职位：</label>
                        <a class="custom-select-header flex layout layout-align-start-center">
                            <div class="custom-select-name">选择您的职位</div>
                        </a>
                        <i class="caret_right"></i>
                        <input validate-field="job" required-msg="请选择您的职位" validate-type="required" type="hidden" name="passport_job_title"/>
                    </div>
                    <div validate-msg="job" class="hide tip">
                    </div>
                </div>
                <div id="email" for="input" validate-item="email" class="form-item">
                    <div validate-ok="email" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-email">*邮箱：</label>
                        <input validate-blur validate-field="email" required-msg="请输入您的邮箱" email-msg="可使用字母、数字、减号、下划线" uniqueEmail-msg="Email已被占用" validate-type="required,email,uniqueEmail" type="text" name="passport_email" class="text-input" maxlength="60" placeholder="输入您的常用邮箱"/>
                    </div>
                    <div validate-msg="email" class="hide tip">
                    </div>
                    <div class="hide tip successTip">
                        可使用字母、数字、减号、下划线
                    </div>
                </div>
                <div id="finishRegister" class="btn_box form-item layout">
                    <a href="#" class="btn btn_full_able layout layout-align-center-center">完成注册</a>
                </div>
            </div>
        </scetion>
    </section>
</form>
<div id="jobCopy" class="hide">
    <div validate-ok="job" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
        <label class="text-label text-label-imgCode">*职位：</label>
        <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-job" data-transition="slide">
            <div class="custom-select-name">选择您的职位</div>
        </a>
        <i class="caret_right"></i>
        <input validate-field="job" required-msg="请选择您的职位" validate-type="required" type="hidden" name="passport_job_title"/>
    </div>
    <div validate-msg="job" class="hide tip">
    </div>
</div>
<div id="otherJobCopy" class="hide">
    <div validate-ok="job" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
        <label class="text-label text-label-imgCode">*职位：</label>
        <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
            <input validate-field="job" validate-type="required" type="text" onkeyup="commonUtilInstance.normal_word(this);" name="passport_job_title" class="text-input" maxlength="20" placeholder="请输入您的职位">
        </div>
    </div>
    <div validate-msg="job" class="hide tip">
        请输入您的职位
    </div>
</div>
<div id="formErrorDialog" role="dialog" class="modal fade myDodal">
    <div class="modal-backdrop fade on"></div>
    <div class="modal-dialog">
        <div class="modal-content formwrapper">
            <div class="modal-header">
                <h4 class="modal-title">提示</h4>
            </div>
            <div class="modal-body">
                <p id="formErrorDialog_content"></p>
                <div class="form-group clearfix margin-top-20 btn_box">
                    <button type="button" class="btn btn_full_able close">确认</button>
                </div>
            </div>
        </div>
    </div>
</div>