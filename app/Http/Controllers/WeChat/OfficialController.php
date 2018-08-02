<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use \EasyWeChat;

/**
 * 公众号控制器
 *
 * 公众号相关逻辑
 * @author  Rain
 * @version 1.0
 */
class OfficialController extends Controller
{
    protected $officialAccount;
    protected $card;

    public function __construct()
    {
        $this->officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $this->card = $this->officialAccount->card;
    }

    /**
     * 创建卡券
     *
     * @author Rain
     * @date   2018/8/2 下午4:04
     *
     * @param $request
     */
    public function createCard(Request $request)
    {
        $officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $card = $officialAccount->card;
        $cardType = 'GIFT';
        $attributes = [
            'base_info' => [
                "logo_url" => "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1533212371100&di=f653891be24b6d62346ca65a46d585a8&imgtype=0&src=http%3A%2F%2Fbpic.588ku.com%2Felement_origin_min_pic%2F01%2F34%2F96%2F23573bca52a6b30.jpg",
                'brand_name' => '远方小镇',
                'code_type' => 'CODE_TYPE_TEXT',
                'title' => '送你一个惊喜!',
                "color" => "Color010",
                "notice" => "使用向我出示此券",
                "service_phone" => "18888888888",
                "description" => "不可与其他优惠同享\n如需团购券发票，请在消费时向商户提出\n店内均可使用。",
                "date_info" => [
                    "type"=> "DATE_TYPE_FIX_TIME_RANGE",
                    "begin_timestamp"=> 1533198540,
                    "end_timestamp"=> 1593398540
                ],
                "sku" => [
                    "quantity" => 10
                ],
                "use_limit"=>100,
                "get_limit"=> 3,
                "use_custom_code"=> false,
                "bind_openid"=> false,
                "can_share"=> true,
                "can_give_friend"=> true,
            ],
            'advanced_info' => [
                'use_condition' => [
                    'accept_category' => "礼物",
                    'reject_category' => '纸',
                    'can_use_with_other_discount' => true,
                ],
            ],
            "gift" => "可兑换白纸一张!",
        ];
        $result = $card->create($cardType, $attributes);
        dd($result);
    }

    /**
     * 创建卡券二维码
     *
     * @author Rain
     * @date   2018/8/2 下午5:33
     *
     * @param Request $request
     */
    public function createCardQr(Request $request)
    {
        $officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $card = $officialAccount->card;
        // 领取单张卡券
        $cards = [
            'action_name' => 'QR_CARD',
            'expire_seconds' => 1800,
            'action_info' => [
                'card' => [
                    'card_id' => 'pyP-M5r05QLz835B27UDMt2EXji8',
                    'is_unique_code' => false,
                    'outer_id' => 1,
                ],
            ],
        ];
        $result = $card->createQrCode($cards);
        dd($result);
    }

    /**
     * 获取卡券
     *
     * @author Rain
     * @date   2018/8/2 下午5:39
     *
     */
    public function getCardQr(){
        $officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $card = $officialAccount->card;
        $ticket = 'gQFu7zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyOGZxZFpPOF9lY0MxdE9veTFyNEMAAgRq0WJbAwQIBwAA==';
        $result = $card->getQrCodeUrl($ticket);
        dd($result);
    }

    /**
     * setWhiteList
     *
     * @author Rain
     * @date   2018/8/2 下午5:48
     *
     */
    public function setWhiteList(){
        $officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $card = $officialAccount->card;
        $usernames = ['ychy00001',"wangyuyuan451392"];
        $result = $card->setTestWhitelistByName($usernames);
        dd($result);
    }

    /**
     * 查询卡券信息
     *
     * @author Rain
     * @date   2018/8/2 下午5:54
     *
     */
    public function getCardInfo(){
        $result = $this->card->get("pyP-M5r05QLz835B27UDMt2EXji8");
        dd($result);
    }

    /**
     * 消费卡券
     *
     * @author Rain
     * @date   2018/8/2 下午6:04
     *
     */
    public function cardConsume(){
        $result = $this->card->code->consume("177351142657");
        dd($result);
    }
}