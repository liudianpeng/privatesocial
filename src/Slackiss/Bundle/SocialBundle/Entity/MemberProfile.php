<?php

namespace Slackiss\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * MemberProfile
 * @Vich\Uploadable
 * @ORM\Table(name="member_profile")
 * @ORM\Entity(repositoryClass="Slackiss\Bundle\SocialBundle\Entity\MemberProfileRepository")
 */
class MemberProfile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\OneToOne(targetEntity="Member",inversedBy="member")
     * @ORM\JoinColumn(name="member_id",referencedColumnName="id",unique=true)
     */
    private $member;

    /**
     *
     * @ORM\Column(name="string",length=100, nullable=true,unique=true)
     */
    private $nickname;

    /**
     * @var string
     * @Assert\Length(max=500, maxMessage="请不要超过500个字")
     * @ORM\Column(name="description", type="text",nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\Column(name="avatar",type="string",length=255,nullable=true)
     */
    private $avatar;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png","image/jpeg","image/pjpeg",
     *                          "image/jpg","image/gif"}
     * )
     * @Vich\UploadableField(mapping="avatar", fileNameProperty="avatar")
     * @var File $image
     */
    private $avatarAttach;

    public function setAvatarAttach($avatarAttach)
    {
        $this->avatarAttach = $avatarAttach;
        if($avatarAttach){
            $this->avatar = $avatarAttach->getFileName();
        }
        return $this;
    }

    public function getAvatarAttach()
    {
        return $this->avatarAttach;
    }
    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Member
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set member
     *
     * @param string $member
     * @return MemberProfile
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return string
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return MemberProfile
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return MemberProfile
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }
}
